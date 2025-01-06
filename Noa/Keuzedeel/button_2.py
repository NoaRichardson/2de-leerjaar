from machine import Pin
import time

LED1_PIN = 0
LED2_PIN = 2
LED3_PIN = 5
BUTTON1_PIN = 15
BUTTON2_PIN = 14
BUTTON3_PIN = 13

led_1 = Pin(LED1_PIN, Pin.OUT)
button_1 = Pin(BUTTON1_PIN, Pin.IN, Pin.PULL_DOWN)
led_2 = Pin(LED2_PIN, Pin.OUT)
button_2 = Pin(BUTTON2_PIN, Pin.IN, Pin.PULL_DOWN)
led_3 = Pin(LED3_PIN, Pin.OUT)
button_3 = Pin(BUTTON3_PIN, Pin.IN, Pin.PULL_DOWN)

while True:
    if button_1.value():
        led_1.on()
        led_2.on()
        led_3.on()
    elif button_2.value():
        led_1.toggle()
        led_2.toggle()
        led_3.toggle()
    elif button_3.value():
        led_1.off()
        led_2.off()
        led_3.off()
        
        