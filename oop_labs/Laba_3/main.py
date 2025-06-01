from subprocess import Popen
from sys import executable
from time import sleep

print("Test started")
server = Popen([executable, 'socket_server.py'])
print("Server started")
lab = Popen([executable, 'Laba_3.py'])
sleep(3)
server.kill()
lab.kill()
print("Test ended") 