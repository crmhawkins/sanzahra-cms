<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Nuevo contacto - Sanzahra</title>
</head>
<body style="font-family:sans-serif;color:#333;max-width:600px;margin:0 auto;padding:20px">
<h2 style="color:#1a1a1a;border-bottom:2px solid #c9a96e;padding-bottom:10px">Nuevo mensaje de contacto</h2>
<table style="width:100%;border-collapse:collapse;margin-top:20px">
  <tr><td style="padding:10px 8px;font-weight:bold;width:120px;color:#666">Nombre:</td><td style="padding:10px 8px">{{ $data['nombre'] }}</td></tr>
  <tr style="background:#f9f9f9"><td style="padding:10px 8px;font-weight:bold;color:#666">Email:</td><td style="padding:10px 8px"><a href="mailto:{{ $data['email'] }}" style="color:#c9a96e">{{ $data['email'] }}</a></td></tr>
  @if(!empty($data['telefono']))
  <tr><td style="padding:10px 8px;font-weight:bold;color:#666">Tel&eacute;fono:</td><td style="padding:10px 8px">{{ $data['telefono'] }}</td></tr>
  @endif
  @if(!empty($data['asunto']))
  <tr style="background:#f9f9f9"><td style="padding:10px 8px;font-weight:bold;color:#666">Asunto:</td><td style="padding:10px 8px">{{ $data['asunto'] }}</td></tr>
  @endif
  <tr><td style="padding:10px 8px;font-weight:bold;color:#666;vertical-align:top">Mensaje:</td><td style="padding:10px 8px;white-space:pre-wrap;line-height:1.6">{{ $data['mensaje'] }}</td></tr>
</table>
<p style="color:#999;font-size:12px;margin-top:30px;border-top:1px solid #eee;padding-top:15px">Enviado desde el formulario de contacto de <a href="https://sanzahra.com" style="color:#c9a96e">sanzahra.com</a></p>
</body>
</html>
