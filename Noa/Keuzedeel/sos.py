from machine import Pin
import time

LED_PIN = 1
led = Pin(LED_PIN, Pin.OUT)

mors = [[3, 0.5], [3, 2], [3, 0.5]]

for x in range(len(mors)):
    for a in range(mors[x][0]):
        led.value(1)
        time.sleep(mors[x][1])
        led.value(0)