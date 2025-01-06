from machine import Pin
import utime
import random
import time

last_time = time.ticks_ms()
red_led = Pin(0, Pin.OUT)
yellow_led = Pin(2, Pin.OUT)
green_led = Pin(3, Pin.OUT)

while True:
    current_time = time.ticks_ms()
    delta_time = time.ticks_diff(current_time, last_time)
    if delta_time >= 5000 and delta_time < 8000:
        red_led.on()
    elif delta_time >= 8000 and delta_time < 11000:
        red_led.off()
        yellow_led.on()
    elif delta_time >= 11000 and delta_time < 16000:
        red_led.off()
        yellow_led.off()
        green_led.on()
    elif delta_time >= 16000:
        red_led.off()
        yellow_led.off()
        green_led.off()