from py122u import nfc

reader = nfc.Reader()
reader.connect()
reader.print_data(reader.get_uid())