<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Confirmation Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  table{
    table-layout:fixed;
    max-width:100%;
    height:auto;
    width:100%; 
  }
  #content a:link {
    text-decoration: none;
    color:#2b7de1;
  }
  #content{
    background-color:#fcfcfc;
    max-width:660px;
    padding:40px;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font:Lucida Sans Unicode, sans-serif;
    background-color:#FFF;
    line-height:21px;
  }

  .wrapper{
    clear:both;
    background-color:#e9e9e9;
    padding:2%;
  }

  .body{
    background-color:#e9e9e9;
    box-shadow: 5px 5px 2px #aaaaaa;
    max-width:100%;
    margin:0 auto;
    width:660px;
    clear:both;
    font-size: 100%;
  }
  #footer{
    max-width:660px;
    padding-top:30px;
    margin-left:0;
    text-align:center;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font-size:14px;
    background:#2b2c2b;
    color:#FFF;
    height:100px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;

  }
  #footer ul li{
    text-align:center;

    text-decoration:none;
    display:inline;
    margin-right:20px;

  }
  img {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    text-align:center;
    max-width:100%;
    height:auto;
    width:auto; 
  }
  a:link {
    text-decoration: none;
    color:#FFF;
  }

  a:visited {
    text-decoration: none;
    color:#FFF;
  }

  a:hover {
    text-decoration: underline;
    color:#FFF;
  }

  a:active {
    text-decoration: underline;
  }

  @media screen and (min-width: 150px) and (max-width: 478px){

    table{
      table-layout:fixed;
      width:100% !important;
      font-size: 12px !important;
    }
    .end-td{
      width: 33.33% !important;
    }
    .middle-td{
      width: 33.33% !important;
    }
    #content a:link {
      text-decoration: none;
      color:#2b7de1;
    }
    #content{
      background-color:#fcfcfc;
      max-width:660px;
      padding:20px;
      font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
      font:Lucida Sans Unicode, sans-serif;
      background-color:#FFF;
      line-height:21px;
    }

    .wrapper{
      clear:both;
      background-color:#e9e9e9;
      padding:2%;
    }

    .body{
      background-color:#e9e9e9;
      box-shadow: 5px 5px 2px #aaaaaa;
      max-width:100%;
      margin:0 auto;
      width:660px;
      clear:both;
      font-size: 13px;
    }
    #footer{
      max-width:660px;
      padding-top:30px;
      margin-left:0;
      text-align:center;
      font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
      font-size:12px;
      background:#282a73;
      color:#fed405;
      height:100px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;

    }
    #footer ul li{
      text-align:center;

      text-decoration:none;
      display:inline;
      margin-right:20px;

    }
    img {
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      text-align:center;
      max-width:100%;
      height:auto;
      width:auto; 
    }
    a:link {
      text-decoration: none;
      color:#FFF;
    }

    a:visited {
      text-decoration: none;
      color:#FFF;
    }

    a:hover {
      text-decoration: underline;
      color:#FFF;
    }

    a:active {
      text-decoration: underline;
    }

  }


</style>

<body>
  <table style='table-layout:fixed;width:90%;'>
    <tr>
      <td>
        <div class='wrapper' style='clear:both;background-color:#e9e9e9;padding:2%;'>
          <div class='body' style='background-color:#e9e9e9;box-shadow: 5px 5px 2px #aaaaaa;max-width:100%;margin:0 auto;width:660px;clear:both;'>
            <div><img src='http://www.vestabyte.com/assets/images/email/VB_header.png' width='100%' style="max-width: 100%;"/>
            </div>
            <div id='content' style='max-width:660px;padding:40px;background-color:#FFF;line-height:21px;'>
              <!-- <div align='center'><img src='".URL."public/images/eb.png' align='middle' width='300px'><br></div> -->
              <h2>Thank you {{$user->first_name}}!</h2>
              <p style ='font-size:15px;'>We have received your expression of interest for <b>{{$project->title}}</b>.</p>
                <p style ='font-size:15px;'>For any queries please contact us directly.</p><br>
                <p style ='font-size:15px;'>Regards,</p>
                <p style='font-size:15px;'>Vestabyte Team.</p>
            </div>
            <div id='footer' style='max-width:660px;padding-top:30px;margin-left:0;text-align:center;font-size:14px;background:#2d2d4b;color:#fed405;height:150px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;'>
              <img src='http://www.vestabyte.com/assets/images/email/VB_footer.png'>
               <ul style='margin-left:-40px;'>
                  <li style='text-align:center;display:inline;margin-right:20px;'><a href="tel:+61398117015"  style='text-decoration:none; color:#fed405;'>+613 98117015</a></li>
                  <li style='text-align:center;display:inline;margin-right:20px;'><a href="mailto:info@vestabyte.com"  style='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Confirmation Email</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
  table{
    table-layout:fixed;
    width:70%;
  }
  #content a:link {
    text-decoration: none;
    color:#2b7de1;
  }
  #content{
    background-color:#fcfcfc;
    max-width:660px;
    padding:40px;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font:Lucida Sans Unicode, sans-serif;
    background-color:#FFF;
    line-height:21px;
  }

  .wrapper{
    clear:both;
    background-color:#e9e9e9;
    padding:2%;
  }

  .body{
    background-color:#e9e9e9;
    box-shadow: 5px 5px 2px #aaaaaa;
    max-width:100%;
    margin:0 auto;
    width:660px;
    clear:both;
  }
  #footer{
    max-width:660px;
    padding-top:30px;
    margin-left:0;
    text-align:center;
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font-size:14px;
    background:#2b2c2b;
    color:#FFF;
    height:100px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;

  }
  #footer ul li{
    text-align:center;

    text-decoration:none;
    display:inline;
    margin-right:20px;

  }
  img {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    text-align:center;
    max-width:100%;
    height:auto;
    width:auto; 
  }
  a:link {
    text-decoration: none;
    color:#FFF;
  }

  a:visited {
    text-decoration: none;
    color:#FFF;
  }

  a:hover {
    text-decoration: underline;
    color:#FFF;
  }

  a:active {
    text-decoration: underline;
  }

  @media screen and (min-width: 150px) and (max-width: 478px){

    table{
      table-layout:fixed;
      width:100%;
    }
    #content a:link {
      text-decoration: none;
      color:#2b7de1;
    }
    #content{
      background-color:#fcfcfc;
      max-width:660px;
      padding:20px;
      font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
      font:Lucida Sans Unicode, sans-serif;
      background-color:#FFF;
      line-height:21px;
    }

    .wrapper{
      clear:both;
      background-color:#e9e9e9;
      padding:2%;
    }

    .body{
      background-color:#e9e9e9;
      box-shadow: 5px 5px 2px #aaaaaa;
      max-width:100%;
      margin:0 auto;
      width:660px;
      clear:both;
    }
    #footer{
      max-width:660px;
      padding-top:30px;
      margin-left:0;
      text-align:center;
      font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
      font-size:14px;
      background:#282a73;
      color:#fed405;
      height:100px;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;

    }
    #footer ul li{
      text-align:center;

      text-decoration:none;
      display:inline;
      margin-right:20px;

    }
    img {
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      text-align:center;
      max-width:100%;
      height:auto;
      width:auto; 
    }
    a:link {
      text-decoration: none;
      color:#FFF;
    }

    a:visited {
      text-decoration: none;
      color:#FFF;
    }

    a:hover {
      text-decoration: underline;
      color:#FFF;
    }

    a:active {
      text-decoration: underline;
    }

  }


</style>

<body>
  <table style='table-layout:fixed;width:90%;'>
    <tr>
      <td>
        <div class='wrapper' style='clear:both;background-color:#e9e9e9;padding:2%;'>
          <div class='body' style='background-color:#e9e9e9;box-shadow: 5px 5px 2px #aaaaaa;max-width:100%;margin:0 auto;width:660px;clear:both;'>
            <div><img src='http://www.vestabyte.com/assets/images/email/VB_header.png' width='100%'/>
            </div>
            <div id='content' style='max-width:660px;padding:40px;background-color:#FFF;line-height:21px;'>
              <!-- <div align='center'><img src='".URL."public/images/eb.png' align='middle' width='300px'><br></div> -->
              <h2>Thank you <b>{{$user->first_name}}</b></h2>
              <p style ='font-size:15px;'>We have received your expression of interest for <b>{{$project->title}}</b>.</p>
                <p style ='font-size:15px;'>For any queries please contact us directly.</p><br>
                <p style ='font-size:15px;'>Regards,</p>
                <p style='font-size:15px;'>Vestabyte Team</p>
            </div>
            <div id='footer' bgcolor="#2D2D4B" style='max-width:660px;padding-top:30px;margin-left:0;text-align:center;background:#2d2d4b;color:#fed405;height:150px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;'>
            <img src='http://www.vestabyte.com/assets/images/email/VB_footer.png' />
            <table style=" text-align:center;background:#2d2d4b; font-size: 13px; width: 100%;">
              <tr>
                <td style='text-align:right;' width="25%"><a href="tel:+61398117015"  style='text-decoration:none; color:#fed405;'>+61398117015 &nbsp;&nbsp;</a></td>
                <td style='text-align:left;' width="25%"><a href="mailto:info@vestabyte.com"  style='text-decoration:none; color:#fed405;'>&nbsp;&nbsp;info@vestabyte.com</a>
                </td>
              </tr>
            </table>
            <table style="text-align:center;background:#2d2d4b; font-size: 16px; width: 100%">
              <tr>
                <td width="40%" class="end-td" style='text-align:right;'><a href='https://www.vestabyte.com/' target='new' style='text-decoration:none; color:#fed405;'><b>HOME</b></a></td>
                <td width="20%" class="middle-td" style='text-align:center;' class="investment"><a href='https://www.vestabyte.com/#projects' target='new' style='text-decoration:none; color:#fed405;'><b>INVESTMENT</b></a></td>
                <td width="40%" char="end-td" style='text-align:left;'><a href='https://www.vestabyte.com/pages/faq' target='new' style='text-decoration:none; color:#fed405;'><b>FAQs</b></a></td>
              </tr>
            </table>
            <br>
          </div>
          </div>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>