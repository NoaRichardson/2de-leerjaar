import machine
import time

TRIG_PIN = 0 
ECHO_PIN = 1
GREEN_LED = 2  
RED_LED = 3
YELLOW1_LED = 4
YELLOW2_LED = 5
YELLOW3_LED = 6

trig = machine.Pin(TRIG_PIN, machine.Pin.OUT)
echo = machine.Pin(ECHO_PIN, machine.Pin.IN)

green = machine.Pin(GREEN_LED, machine.Pin.OUT)
red = machine.Pin(RED_LED, machine.Pin.OUT)
yellow1 = machine.Pin(YELLOW1_LED, machine.Pin.OUT)
yellow2 = machine.Pin(YELLOW2_LED, machine.Pin.OUT)
yellow3 = machine.Pin(YELLOW3_LED, machine.Pin.OUT)

red.value(0)
yellow1.value(0)
yellow2.value(0)
yellow3.value(0)

def measure_distance():

    trig.low()
    time.sleep_us(2)
    trig.high()
    time.sleep_us(10)
    trig.low()
    
    while echo.value() == 0:
        start_time = time.ticks_us()
    
    while echo.value() == 1:
        end_time = time.ticks_us()
    
    duration = time.ticks_diff(end_time, start_time)
    distance = (duration * 0.0343) / 2
    return distance

periode = 10000
distances = []
measured_time = time.ticks_ms()

while (time.ticks_ms() - measured_time) <= periode:
  green.value(1)
  distance = measure_distance()
  distances.append(distance)

green.value(0)
smallest_distance = min(distances)
if smallest_distance > 30:
    red.value(1)
elif smallest_distance < 30 and smallest_distance >= 20:
  yellow1.value(1)
  yellow2.value(1)
  yellow3.value(1)
elif smallest_distance < 20 and smallest_distance >= 10:
  yellow1.value(1)
  yellow2.value(1)
  yellow3.value(0)
elif smallest_distance < 10:
  yellow1.value(1)
  yellow2.value(0)
  yellow3.value(0)
print("De opgeslagen afstand is: {:.2f} cm".format(smallest_distance))