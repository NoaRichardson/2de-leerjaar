from machine import Pin
import time

periode = 5000
measured_time = time.ticks_ms()
while True:
    current_time = time.ticks_ms()
    if (current_time - measured_time) > periode:
        measured_time = time.ticks_ms()
        print("hallo")
