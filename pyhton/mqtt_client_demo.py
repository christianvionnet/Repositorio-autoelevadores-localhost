import paho.mqtt.client as mqtt
import time

def on_connect(client, userdata, flags, rc):
    print("Connected with result code "+str(rc))
    client.subscribe([("MPO/mpo1",1),("MPO/mpo2",1),("MPO/mpo3",1),("MPO/mpo4",1),("MPO/mpo5",1),("MPO/mpo6",1),("MPO/mpo7",1),("MPO/mpo8",1),("MPO/mpo9",1),("MPO/mpo10",1),("MPO/mpo11",1),("MPO/mpo12",1)])

def on_message(client, userdata, msg):

    if msg.topic == "MPO/mpo1":
        if(msg.payload == "1"):
            print("*1- SENTIDO DE MARCHA: ADELANTE/ATRAS: OK")

        else:
            print("*1- SENTIDO DE MARCHA: ADELANTE/ATRAS: NO OK")
            
    elif msg.topic == "MPO/mpo2":
        if(msg.payload == "1"):
            print("*2- FUNCIONAMIENTO DE FRENOS: OK")
        else:
            print("*2- FUNCIONAMIENTO DE FRENOS: NO OK")
            
    elif msg.topic == "MPO/mpo3":
        if(msg.payload == "1"):
            print("*3- FUNCIONAMIENTO DE SISTEMA DE DIRECCION: OK")
        else:
            print("*3- FUNCIONAMIENTO DE SISTEMA DE DIRECCION: NO OK")
            
    elif msg.topic == "MPO/mpo4":
        if(msg.payload == "1"):
            print("4- MOVIMIENTOS HIDRAULICOS: OK")
        else:
            print("4- MOVIMIENTOS HIDRAULICOS: NO OK")
            
    elif msg.topic == "MPO/mpo5":
        if(msg.payload == "1"):
            print("5- NIVEL DE CARGA DE BATERIA: OK")
        else:
            print("5- NIVEL DE CARGA DE BATERIA: NO OK")
            
    elif msg.topic == "MPO/mpo6":
        if(msg.payload == "1"):
            print("6- *9- OBJETOS EXTRANIOS EN MASTIL Y GUIAS: OK")
        else:
            print("6- *9- OBJETOS EXTRANIOS EN MASTIL Y GUIAS: NO OK")
            
    elif msg.topic == "MPO/mpo7":
        if(msg.payload == "1"):
            print("*7- SENSOR DE HOMBRE PRESENTE: OK")
        else:
            print("*7- SENSOR DE HOMBRE PRESENTE: NO OK")
            
    elif msg.topic == "MPO/mpo8":
        if(msg.payload == "1"):
            print("*8- HORQUILLAS AGRIETADAS O DESGASTADAS: OK")
        else:
            print("*8- HORQUILLAS AGRIETADAS O DESGASTADAS: NO OK")
            
    elif msg.topic == "MPO/mpo9":
        if(msg.payload == "1"):
            print("*9- OBJETOS EXTRANIOS EN MASTIL Y GUIAS: OK")
        else:
            print("*9- OBJETOS EXTRANIOS EN MASTIL Y GUIAS: NO OK")
            
    elif msg.topic == "MPO/mpo10":
        if(msg.payload == "1"):
            print("*10- DETERIORO Y CUERPOS EXTRANOS EN RUEDAS: OK")
        else:
            print("*10- DETERIORO Y CUERPOS EXTRANOS EN RUEDAS: NO OK")
    
    elif msg.topic == "MPO/mpo11":
        if(msg.payload == "1"):
            print("11- PERDIDAS DE ACEITE: OK")
        else:
            print("11- PERDIDAS DE ACEITE: NO OK")
            
    elif msg.topic == "MPO/mpo12":
        if(msg.payload == "1"):
            print("12- ESTADO GENERAL: OK")
        else:
            print("12- ESTADO GENERAL: NO OK")

    print("---------------------------------------------")


try:
    client = mqtt.Client()
    client.on_connect = on_connect
    client.on_message = on_message
 
    client.connect("test.mosquitto.org", 1883, 60)

    time.sleep(3)
    client.loop_forever()
    
except KeyboardInterrupt:
    # disconnect
    print("Stropping the client ...")
    client.disconnect()
    
finally:
    client = mqtt.Client()
    client.on_connect = on_connect
    client.on_message = on_message
 
    client.connect("test.mosquitto.org", 1883, 60)

    time.sleep(3)
    client.loop_forever()