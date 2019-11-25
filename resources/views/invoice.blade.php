
<!DOCTYPE html>
<html lang="th" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>PDF</title>   
     <style>
   @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
    
     </style>
  </head>
  <body >
        <div class="container">
            <div class="header">
                <div class="full-name">
                <span class="first-name">{{$data->name}}</span> 
               
                </div>
                <div class="contact-info">
                    <span class="email">Email:</span>
                    <span class="email-val">{{ $data->email }}</span>
                    <span class="separator"></span>
                    <span class="phone">Phone: </span>
                    <span class="phone-val">{{ $data->phone }}</span>
                </div>
                
                <div class="about">
                    <span class="position">ประสบการณ์</span>
                    <span class="desc">
                    {{$data->experience}}
                    </span>
                </div>
            </div> 
            <div class="details">
                <div class="section">
                    <div class="section__title">education</div>
                    <div class="section__list">
                        <div class="section__list-item">
                            <div class="left">
                                <div class="name">{{$data->education}}</div>                               
                            </div>
                           
                        </div>   
                    </div>
                </div>
            </div>  
        </div>
</body>
</html>
