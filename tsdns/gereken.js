
$("#dnsolusturForm").submit(function(event){
	$("#uyarilar").html('<b>TSDNS wird erstellt, bitte warten ..</b>');
	var istek;

    // Verteidigen Sie die Daten sicher. Überprüfen Sie die Standardübermittlung.
    event.preventDefault();
  
	// Ausstehende Anfragen abbrechen.
    if (istek) {
        istek.abort();
    }
	
	// Ich richte hier einige lokale Variablen ein.
    var $form = $(this);
	
	// Ich wähle alle Felder aus und puffere sie zwischen.
    var $inputs = $form.find("input, select, button, textarea");
	
	// Serialisieren Sie Daten in Formularen
    var serializedData = $form.serialize();
	
    // Ajax talebinin süresi için girdileri devre dışı bırakalım.
    // Not: Nach der Serialisierung der Formulardaten deaktivieren wir die Elemente.
    // Deaktivierte Formularelemente werden nicht serialisiert.
    $inputs.prop("disabled", false);
    $.ajax({	
	  type: 'post',
	  url: 'islemler.inc.php?islem=dnsolusturabb',
	  data: serializedData,
	  success: function(cevap){ $("#uyarilar").html(cevap).hide().fadeIn(700); }	
    });

	// Callback-Handler zum Aufruf zum Erfolg
    istek.done(function (response, textStatus, jqXHR){
    // Nachricht an Konsole senden
        console.log("Er arbeitet!");
    });

    // Callback-Handler zum Aufrufen eines Fehlers
    istek.fail(function (jqXHR, textStatus, errorThrown){
    // Fehler in Konsole speichern
        console.error(
            "Der folgende Fehler ist aufgetreten: "+
            textStatus, errorThrown
        );
    });

    // Unerwünschter Callback-Handler
    // Anfrage fehlgeschlagen oder erfolgreich
    istek.always(function () {
    // Einträge aktivieren
    $inputs.prop("disabled", false);
    });

});

$(function() {   
    $(".gizleyebilirsin").hide(5000);
});