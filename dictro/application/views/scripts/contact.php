<html>
<head>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="$border">
  <tr bgcolor="green">
    <td class="title">Contact</td>
  </tr>
  <tr><td bgcolor="green"></td></tr>
  <tr bgcolor="green">
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
               <div align="center">
        </div>
        <form action="index.php?site=contact" method="post">
        <input type="hidden" name="action" value="send" />
        <table width="75%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
            <td>Name</td>
            <td><input name="name" value="$name" size="40" /></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><input name="from" value="$from" size="40" /></td>
          </tr>
          <tr>
            <td>Subject</td>
            <td><input name="subject" value="$subject" size="40" /></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><textarea name="text" cols="50" rows="6" style="width:99%;">$text</textarea></td>
      
           </tr>
          <tr>
            <td><center><input type="submit" value="Send" /></center></td>
          </tr>
        </table>
        </form>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>

</body>

</html>