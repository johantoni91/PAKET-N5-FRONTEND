import usb.core     # main module

import usb.util     # contains utility functions

import string

 


VENDOR_ID = 0x05e0

PRODUCT_ID = 0x1300


while True:

    try:

        # find our device using vendor ID and Product ID

        dev = usb.core.find(idVendor=VENDOR_ID, idProduct=PRODUCT_ID)

        print(dev)

    except usb.core.USBTimeoutError as timeOutError:

        print("Scanner Read Time Out Occurred \n")

        print("Closing device Object and")

    except Exception as e:

        print(f"The following exception has occurred {e} \n . Retrying.........")