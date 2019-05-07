<h1>Registration confirmation</h1>
<p>Dear, <?= $user_name; ?>, thank you for the registration.</p>
<p>To complete registration click the link below:</p>
<p><a href="asp/account-confirmation.php?email=<?= $confirm_email; ?>&code=<?= $code; ?>"
      style="color: #fff;
      background-color: #17a2b8;
      display: inlie-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid #17a2b8;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
">CONFIRM EMAIL</a></p>
<p>If you haven't registered on the website of Suomi Partnership Association,
  ignore this message and <b>don't send the confirmation link</b> to anyone.</p>
<hr style="border: none; height: 1px; color: grey; background-color: grey"><br>
<!--вставьте адрес сайта в href вместо #-->
<small><a href="#" target="_blank">Suomi Partnership Association</a></small>
