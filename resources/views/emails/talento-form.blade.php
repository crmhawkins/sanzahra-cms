<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Nueva candidatura - Sanzahra</title>
</head>
<body style="font-family:sans-serif;color:#333;max-width:600px;margin:0 auto;padding:20px">
<h2 style="color:#1a1a1a;border-bottom:2px solid #c9a96e;padding-bottom:10px">Nueva candidatura: Buscamos la pr&oacute;xima generaci&oacute;n</h2>
<table style="width:100%;border-collapse:collapse;margin-top:20px">
  <tr><td style="padding:10px 8px;font-weight:bold;width:130px;color:#666">Nombre:</td><td style="padding:10px 8px">{{ $data['nombre'] }}</td></tr>
  <tr style="background:#f9f9f9"><td style="padding:10px 8px;font-weight:bold;color:#666">Email:</td><td style="padding:10px 8px"><a href="mailto:{{ $data['email'] }}" style="color:#c9a96e">{{ $data['email'] }}</a></td></tr>
  @if(!empty($data['telefono']))
  <tr><td style="padding:10px 8px;font-weight:bold;color:#666">Tel&eacute;fono:</td><td style="padding:10px 8px">{{ $data['telefono'] }}</td></tr>
  @endif
  <tr style="background:#f9f9f9"><td style="padding:10px 8px;font-weight:bold;color:#666">Perfil:</td><td style="padding:10px 8px">{{ $data['perfil'] }}</td></tr>
  @if(!empty($data['portfolio']))
  <tr><td style="padding:10px 8px;font-weight:bold;color:#666">Portfolio / redes:</td><td style="padding:10px 8px;word-break:break-all">{{ $data['portfolio'] }}</td></tr>
  @endif
  <tr style="background:#f9f9f9"><td style="padding:10px 8px;font-weight:bold;color:#666;vertical-align:top">Sobre ti:</td><td style="padding:10px 8px;white-space:pre-wrap;line-height:1.6">{{ $data['mensaje'] }}</td></tr>
</table>
<p style="color:#999;font-size:12px;margin-top:30px;border-top:1px solid #eee;padding-top:15px">Enviado desde el formulario de captaci&oacute;n de talento de <a href="https://sanzahra.com/moda#talento" style="color:#c9a96e">sanzahra.com/moda</a></p>
</body>
</html>
