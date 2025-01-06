from machine import Pin
import time

LED_PIN = 0
BUTTON_PIN = 15

led = Pin(LED_PIN, Pin.OUT)
button = Pin(BUTTON_PIN, Pin.IN, Pin.PULL_DOWN)

while True:
    if button.value():
        led.on()
    else:
        led.off()