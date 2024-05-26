
import axios from 'axios';

import Quagga from '@ericblade/quagga2';

document.addEventListener('DOMContentLoaded', () => {
  const scannerContainer = document.querySelector('#scanner-container');

  if (scannerContainer) {
    Quagga.init({
      inputStream: {
        name: "Live",
        type: "LiveStream",
        target: scannerContainer   
      },
      decoder: {
        readers: ["ean_reader"]
      }
    }, function (err) {
      if (err) {
        console.log(err);
        return;
      }
      console.log("Initialization finished. Ready to start");
      Quagga.start();
   
    });
 

    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d', { willReadFrequently: true });

 
  }

  Quagga.onDetected(function (result) {
    console.log(result);
    const code = result.codeResult.code;
    document.querySelector('#barcode-result').innerText = "Detected Barcode: " + code;
    console.log("Ergebnis geliefert");

    // AJAX-Anfrage senden
    fetch('/scan-code', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({ barcode: code })
    })
      .then(response => response.json())
      .then(data => {
        console.log('Ergebnis von der API:', data);
        if (data.redirect) {
          // Weiterleiten zur  URL
          window.location.href = data.redirect;
        }
      })
      .catch(error => {
        console.error('Fehler:', error);
      });
  });



});






