#!/usr/bin/env python
import time
import RPi.GPIO as gpio
import mysql.connector
import serial
import os

db = mysql.connector.connect(
    host="localhost",
    user="sysadmin",
    passwd="123456",
    database="Autoelevadores"
)

#Enable Serial Communication
port = serial.Serial("/dev/ttyAMA0", baudrate=9600, timeout=0.01)
counter=0
data=[]
Sentado = False
cursor = db.cursor()
resultado = 0
bandera = 0

#Declaro los pines GPIO
LedVerde = 23
LedRojo = 18
Buzzer = 24
ReleElo = 25
ReleAuto = 22
Sensor = 27

#Designo las entradas y salidas
gpio.setmode(gpio.BCM)
gpio.setwarnings(False)
gpio.setup(LedRojo, gpio.OUT)
gpio.setup(LedVerde, gpio.OUT)
gpio.setup(Buzzer, gpio.OUT)
gpio.setup(ReleElo, gpio.OUT)
gpio.setup(ReleAuto, gpio.OUT)
gpio.setup(Sensor, gpio.IN)

#Seteo en estado apagado los relés del monitor y del auto
gpio.output(ReleElo, gpio.LOW)
gpio.output(ReleAuto, gpio.LOW)

#Defino INTERRUPCIÓN: función de cuenta hasta 10 segundos (120 segundos una vez probado)
def Cuenta(self):
    print("Se activó la interrupción")
    time.sleep(10)
    
    #Si sensor esta en bajo (usuario sentado) enciendo monitor y auto SÓLO si esta habilitado,
    #es decir tendría que volver a la funcion Lectura_Tarjeta
    if gpio.input(Sensor) == gpio.LOW :
        print("MANTENGO RELES encendidos")
        #gpio.output(ReleAuto, gpio.HIGH)
        #gpio.output(ReleElo, gpio.HIGH)
        #Lectura_Tarjeta(1)
        Sentado = True
        return
    else:
        gpio.output(ReleAuto, gpio.LOW)
        gpio.output(ReleElo, gpio.LOW)
        print("RELES apagados")
        Sentado = False
        return

#Defino función lectura de tarjeta
def Lectura_Tarjeta(self):
    global resultado
    global Sentado
    global bandera
    
    time.sleep(1)
    print("Lectura de Tarjeta")
    print('Coloque su Tarjeta en el lector..')
    port.flushInput()
    # Read the port 
    data = port.readline()
    while len(data) == 0:
        data = port.readline()
        print("Esperando lectura")
        
    dato = str(data)

    tagID = dato[8:]
    tagID = tagID[:8]
    tagID = '0x00'+tagID
    tagIDd = int(tagID,16)


    if len(data) > 0:
        cursor.execute("Select id, name FROM Usuarios WHERE rfid_uid = "+str(tagIDd))
        result = cursor.fetchone()
        if cursor.rowcount >= 1:
            print("Bienvenido " + result[1])
            cursor.execute("INSERT INTO Accesos (user_id) VALUES (%s)", (result[0],) )
            #cursor.execute("UPDATE usuario_activo SET (nombre) VALUES (%s)", (result[0],) )
            gpio.output(LedVerde, gpio.HIGH) #Enciendo LED verde
            gpio.output(Buzzer, gpio.HIGH) #Enciendo BUZZER
            gpio.output(ReleElo, gpio.HIGH) #Enciendo ReleElo
            gpio.output(ReleAuto, gpio.HIGH) #******************************* Enciendo ReleAuto *******************************
            time.sleep(1)
            gpio.output(LedVerde, gpio.LOW) #Apago LED verde
            gpio.output(Buzzer, gpio.LOW) #Apago BUZZER
            #gpio.output(ReleElo, gpio.LOW)
            db.commit()
            bandera = 1
            time.sleep(2)
        else:
            print("El usuario no existe/No esta habilitado.")
            gpio.output(LedRojo, gpio.HIGH)
            gpio.output(Buzzer, gpio.HIGH)
            time.sleep(0.1)
            gpio.output(LedRojo, gpio.LOW)
            gpio.output(Buzzer, gpio.LOW)
            time.sleep(0.1)
            gpio.output(LedRojo, gpio.HIGH)
            gpio.output(Buzzer, gpio.HIGH)
            time.sleep(0.1)
            gpio.output(LedRojo, gpio.LOW)
            gpio.output(Buzzer, gpio.LOW)
            time.sleep(0.1)
            gpio.output(LedRojo, gpio.HIGH)
            gpio.output(Buzzer, gpio.HIGH)
            time.sleep(0.1)
            gpio.output(LedRojo, gpio.LOW)
            gpio.output(Buzzer, gpio.LOW)
            #gpio.output(ReleElo, gpio.LOW)
            #gpio.output(ReleAuto, gpio.LOW)
            bandera = 0
            time.sleep(2)
            return
    port.flushInput()
    cursor.execute("SELECT activo FROM nuevo_turno")
    activo = cursor.fetchone()
    if activo[0] == 0:
        print("MPO ya realizado, se requerirá nuevamente en el próximo turno")
        time.sleep(2)
    
    while activo[0] == 1 :
        time.sleep(1)
        db.commit()
        cursor.execute("SELECT activo FROM nuevo_turno")
        activo = cursor.fetchone()
        print("Hace falta realizar el MPO en este turno")
        time.sleep(2)
        
        #Consulto si el MPO fue finalizado o si esta en curso
        cursor.execute("SELECT Finalizado FROM Fin_Test WHERE id=0")
        result0 = cursor.fetchone()
        
        while result0[0] == '0' :
            time.sleep(2)
            #mysql.connector.flush()
            db.commit()
            cursor.execute("SELECT Finalizado FROM Fin_Test WHERE id=0")
            result0 = cursor.fetchone()
            #print("Dentro del while 'Finalizado' vale: ",result0[0])
            #print (result0)
            print("Esperando realizacion del MPO")

               
        print("MPO FINALIZADO")
        cursor.execute("SELECT mpo1, mpo2, mpo3, mpo7, mpo8, mpo9, mpo10, enable1 FROM tabla1, tabla2, tabla3, habilitacion ORDER BY tabla1.id DESC, tabla2.id DESC, tabla3.id DESC, habilitacion.id DESC LIMIT 1")
        #cursor.execute("SELECT enable1 FROM habilitacion ORDER BY id DESC LIMIT 1")
        result1 = cursor.fetchone()
        mpo1=result1[0]
        mpo2=result1[1]
        mpo3=result1[2]
        mpo7=result1[3]
        mpo8=result1[4]
        mpo9=result1[5]
        mpo10=result1[6]
        enable=result1[7]
        
        #print("Enable: ",enable)
        #time.sleep(1)
        
        cuenta= 0
        if enable == '0':
            for i in result1:
                #print("i vale: ",i) 
                cuenta= cuenta + 1
                if i == '0':
                    resultado = 0
                    break

        else:
            print("No se completó el MPO todavía")

        if (cuenta > 7):
            resultado = 1
          
        if resultado == 0:
            gpio.output(ReleAuto, gpio.LOW)
            print("MPO no OK, NO puede circular")
            cursor.execute("UPDATE Fin_Test SET Finalizado='0'")
            time.sleep(3)
        else:
            gpio.output(ReleAuto, gpio.HIGH)
            print("MPO OK, puede circular")
            cursor.execute("UPDATE Fin_Test SET Finalizado='0'")
            time.sleep(3)
        return

try:
    gpio.add_event_detect(Sensor, gpio.FALLING, callback=Cuenta, bouncetime=500)
    while True:
        Lectura_Tarjeta(1)
        if gpio.input(Sensor) == 1:
            print("Asiento desocupado")
            gpio.output(ReleAuto, gpio.LOW)
            gpio.output(ReleElo, gpio.LOW)  
        else:
            print("Usuario sentado")
            if bandera == 1:
                gpio.output(ReleAuto, gpio.HIGH)
                gpio.output(ReleElo, gpio.HIGH)
            #gpio.output(ReleAuto, gpio.HIGH)
            #gpio.output(ReleElo, gpio.HIGH)
        time.sleep(1)
        
    #gpio.add_event_detect(Sensor, gpio.FALLING, callback=Cuenta, bouncetime=500)
finally:
    
    while True:
        Lectura_Tarjeta(1)
        if gpio.input(Sensor) == 1:
            print("Asiento desocupado")
            gpio.output(ReleAuto, gpio.LOW)
            gpio.output(ReleElo, gpio.LOW)  
        else:
            print("Usuario sentado")
            #gpio.output(ReleAuto, gpio.HIGH)
            #gpio.output(ReleElo, gpio.HIGH)
        time.sleep(1)
        
#gpio.add_event_detect(Sensor, gpio.FALLING, callback=Cuenta, bouncetime=500)