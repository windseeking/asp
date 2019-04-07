<h2>Запрос на вступление в Ассоциацию</h2>

<h3>Контактные данные отправителя:</h3>
<p>Имя: <?= $contact_name; ?></p>
<p>Email: <?= $contact_email; ?></p>

<h3>Данные организации:</h3>
<table>
  <tr>
    <td>Full name of the company</td>
    <td><?= $company_name; ?></td>
  </tr>
  <tr>
    <td>Trade register number</td>
    <td><?= $trade_number; ?></td>
  </tr>
  <tr>
    <td>Y-tunnus (Business ID)</td>
    <td><?= $business_ID; ?></td>
  </tr>
  <tr>
    <td>Official address</td>
    <td><?= $official_address; ?></td>
  </tr>
  <tr>
    <td>Postal address</td>
    <td><?= $postal_address; ?></td>
  </tr>
  <tr>
    <td>Phone number</td>
    <td><a href="tel:<?= $phone; ?>"><?= $phone; ?></a></td>
  </tr>
  <tr>
    <td>Fax</td>
    <td><?= $fax; ?></td>
  </tr>
  <tr>
    <td>Website</td>
    <td><?= $website; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?= $company_email; ?></td>
  </tr>
  <tr>
    <td>Banking details</td>
    <td><?= $banking; ?></td>
  </tr>
  <tr>
    <td>Names of the authorized signors</td>
    <td><?= $signors; ?></td>
  </tr>
  <tr>
    <td>Name of the contact person</td>
    <td><?= $contact_person; ?></td>
  </tr>
  <tr>
    <td>Branch of industry and product description</td>
    <td><?= $description; ?></td>
  </tr>
</table>

<hr>

<!--вставьте адрес сайта в href вместо #-->
<small><a href="#" target="_blank">Suomi Partnership Association</a></small>
