import serial
import requests

def sendPost( uid, hash ):
    myobj = {'uid': uid, 'hash': hash}
    x = requests.post('https://vciot.ahmdshan.com/iot.php', json = myobj)
    print(x)

try:
    serialPort = '/dev/tty.usbmodem11202'
    with serial.Serial(serialPort, baudrate=115200, timeout=1, stopbits=1) as ser:
        while True:
            data = ser.readline().decode().strip()
            if data :
                if data == "l1":
                    print("Signaling light 1")
                    sendPost('1691896950', '71523d46f1db6d9fb40cbdf7f837964c')
                elif data == "l2":
                    print("Signaling light 2")
                    sendPost('1691900461', 'bd8f29224addd42363192c38d58d2e51')
                else:
                    print("No equipment assigned")

except serial.SerialException:
    print(f"Failed {serialPort}.")