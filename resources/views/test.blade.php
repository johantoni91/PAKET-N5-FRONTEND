<!DOCTYPE html>
<html>

<head>
    <title>NFC Reader</title>
</head>

<body>
    <h1>NFC Reader</h1>
    <button id="readNfc">Read NFC</button>
    <p id="nfcData"></p>

    <script>
        document.getElementById('readNfc').addEventListener('click', async () => {
            if ('NDEFReader' in window) {
                try {
                    const ndef = new NDEFReader();
                    await ndef.scan();
                    ndef.onreading = event => {
                        const decoder = new TextDecoder();
                        for (const record of event.message.records) {
                            const data = decoder.decode(record.data);
                            document.getElementById('nfcData').textContent = data;

                            // Send NFC data to Laravel backend
                            // fetch('/api/nfc', {
                            //         method: 'POST',
                            //         headers: {
                            //             'Content-Type': 'application/json',
                            //         },
                            //         body: JSON.stringify({
                            //             data: data
                            //         }),
                            //     })
                            //     .then(response => response.json())
                            //     .then(data => console.log(data))
                            //     .catch(error => console.error('Error:', error));
                        }
                    };
                } catch (error) {
                    console.log('Error reading NFC: ', error);
                }
            } else {
                console.log('Web NFC is not supported in this browser.');
            }
        });
    </script>
</body>

</html>
