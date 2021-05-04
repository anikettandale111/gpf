@extends('Section.app')

@section('content')

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="https://www.google.com/jsapi?api_key=AIzaSyBAmAih-HPRSE9HPxgL0iebxXjUbNR-DI0">
    </script>
    <script type="text/javascript">
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['english2hindi']);
      }
      google.setOnLoadCallback(onLoad);
    </script>
  </head>
  <body>

    <textarea id="english2hindi" style="width:600px;height:200px"></textarea>
 Press Ctrl+g to toggle between English and Hindi
  </body>
</html>
@endsection

