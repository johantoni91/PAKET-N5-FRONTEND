import keyboard

print("Ready to scan. Press 'Esc' to exit.")

while True:
    event = keyboard.read_event()
    if event.event_type == keyboard.KEY_DOWN:
        print(event.name, end="")
        if event.name == 'esc':
            break
