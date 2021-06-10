

<!-- Contenu principal -->

<br><h1><center>Contact</h1>

<br><h1><center>Pour toute information n'hésitez à nous contactez</h1>

<br>
<br>

<head>
		<meta charset="utf-8" />
		
		<style>
			.contactform {
				/* Just to center the form on the page */
				margin: 0 auto;
				width: 400px;
				/* To see the outline of the form */
				padding: 1em;
				border: 1px solid #ccc;
				border-radius: 1em;
			}
			.contactform li + li {
				margin-top: 1em;
			}

			label {
				/* To make sure that all labels have the same size and are properly aligned */
				display: inline-block;
				width: 90px;
				text-align: right;
			}

			input,
			textarea {
				/* To make sure that all text fields have the same font settings By default, textareas have a monospace font */
				font: 1em sans-serif;
				/* To give the same size to all text fields */
				width: 300px;
				box-sizing: border-box; /* To harmonize the look & feel of text field border */
				border: 1px solid #999;
			}

			input:focus,
			textarea:focus {
				/* To give a little highlight on active elements */
				border-color: #000;
			}

			textarea {
				/* To properly align multiline text fields with their labels */
				vertical-align: top;
				/* To give enough room to type some text */
				height: 5em;
			}

			.button {
				/* To position the buttons to the same position of the text fields */
				padding-left: 90px;
				/* same size as the label elements */
			}

			button {
				/* This extra margin represent roughly the same space as the space between the labels and their text fields */
				margin-left: 0.5em;
			}
		</style>
	</head>

<form class="contactform" action="https://formsubmit.co/a.maxant30@gmail.com" method="POST" />
    <div>
        <label for="name">Nom :</label>
        <input type="text" id="name" name="user_name">
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="user_mail">
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="user_message"></textarea>
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
	</div>
	<!--<input type="hidden" name="_next" value="https://site0XX.wec.pelomia.net/message_envoye.html">-->
</form>




