
	
	<?php

	// An welche Adresse sollen die Mails gesendet werden?
	$zieladresse = 'pape-pula@gmx.net';

	// Welcher Absendername soll verwendet werden?
	$absendername = 'Formmailer';

	// Welchen Betreff sollen die Mails erhalten?
	$betreff = 'Feedback';

	// Welche(s) Zeichen soll(en) zwischen dem Feldnamen und dem angegebenen Wert stehen?
	$trenner = ":\t"; // Doppelpunkt + Tabulator

	// Please specify your Mail Server - Example: mail.yourdomain.com.
	ini_set("SMTP","localhost");

	// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
	ini_set("smtp_port","25");

	// Please specify the return address to use
	ini_set('sendmail_from', 'pape-pula@gmx.net');
	

	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$header = array();
		$header[] = "From: ".mb_encode_mimeheader($absendername, "utf-8", "Q");
		$header[] = "MIME-Version: 1.0";
		$header[] = "Content-type: text/plain; charset=utf-8";
		$header[] = "Content-transfer-encoding: 8bit";
		
		$mailtext = "";

		foreach ($_POST as $name => $wert) {
			if (is_array($wert)) {
				foreach ($wert as $einzelwert) {
					$mailtext .= $name.$trenner.$einzelwert."\n";
				}
			} else {
				$mailtext .= $name.$trenner.$wert."\n";
			}
		}

		mail(
			$zieladresse, 
			mb_encode_mimeheader($betreff, "utf-8", "Q"), 
			$mailtext,
			implode("\n", $header)
		) or die("Die Mail konnte nicht versendet werden.");
		exit;
	}


	?>