from machine import Pin, ADC
import utime

xAxis = ADC(Pin(26))
yAxis = ADC(Pin(27))
LED_GREEN = 7 
LED_RED = 16 
LED_YELLOW = 20
LED_BLUE = 0
led_up = Pin(LED_GREEN, Pin.OUT)
led_down = Pin(LED_RED, Pin.OUT)
led_left = Pin(LED_YELLOW, Pin.OUT)
led_right = Pin(LED_BLUE, Pin.OUT)

while True:
    xValue = xAxis.read_u16()
    yValue = yAxis.read_u16()
    xStatus = "middle"
    yStatus = "middle"
    if xValue <= 600:
        led_up.off()
        led_down.off()
        led_right.off()
        xStatus = "left"
        led_left.on()
    elif xValue >= 60000:
        xStatus = "right"
        led_up.off()
        led_down.off()
        led_left.off()
        led_right.on()
    if yValue <= 600:
        led_left.off()
        led_down.off()
        led_right.off()
        yStatus = "up"
        led_up.on()
    elif yValue >= 60000:
        led_up.off()
        led_left.off()
        led_right.off()
        yStatus = "down"
        led_down.on()
    print("X: " + xStatus + ", Y: " + yStatus)
    utime.sleep(0.1)

