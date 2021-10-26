

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/check.css"> <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class='container'>
  
     
              
       
       

        <div class='credit-info'>
          <div class='credit-info-content'>
            <table class='half-input-table'>
              <tr><td>Sélectionner votre carte: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                <div class='dropdown-select'>
                <ul>
                  <li>Master Card</li>
                  <li>American Express</li>
                  </ul></div>
                </div>
               </td></tr>
            </table>
            <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
            numéro de carte
            <input class='input-field'></input>
            titulaire de la carte
            <input class='input-field'></input>
            <table class='half-input-table'>
              <tr>
                <td> Expiré
                  <input class='input-field'></input>
                </td>
                <td>CVC
                  <input class='input-field'></input>
                </td>
              </tr>
            </table>
         <a href="check.php">   <button class='pay-btn'>Vérifier</button></a>

          </div>

        </div>
      </div>
    </div>

<script src="js/check.js"></script>
</body>
</html>