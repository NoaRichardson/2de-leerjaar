from machine import Pin
import utime
import random

button = Pin(0, Pin.IN, Pin.PULL_UP)
led = Pin(2, Pin.OUT)

firstPress = True
lastPressed = 0

while True:
    if button.value() == 0:
        print("Button is pressed")
        currentTime = utime.ticks_ms()
        if not firstPress:
            timeBetween = utime.ticks_diff(currentTime, lastPressed) / 1000
            print(timeBetween)
        
        else:
            firstPress = False
        
        randomValue = random.randint(0, 10)
        utime.sleep(randomValue)
        led.value(1)
        
        while button.value() == 0:
            utime.sleep(0.1)
    
    utime.sleep(0.1)
        