
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <link rel="stylesheet" href="/css/style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> --}}
        <title>DapitanHealthCenter</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" >
    </head>
    <body>
        <header>
            <nav>
                <div id="logo">
                    <img class="logo" src=""/>
                </div>
            </nav>
            <section class="banner">
                <div class="container">
                    <h2>APPOINTMENT SYSTEM</h2>
                    <p id="title">DAPITAN HEALTH CENTER</p>
                    @if (Route::has('login'))
                
                        @auth
                            <button class="submit tow"  onclick="window.location='{{ url("/dashboard") }}'" type="button">Dashboard</button>

                            
                        @else
                          
                         <button class="submit tow" onclick="window.location='{{ url("/login") }}'" type="submit">More Information   >></button>
                         @endauth

                    @endif
                    
                </div>
            </section>
        </header>
        <section class="article">
            <article id="article-three">
                <div class="text">
                    <h3>Announcement</h3>
                    <p class="text-explanation">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam culpa temporibus commodi mollitia odio fuga optio ad debitis aliquam tenetur, numquam excepturi, quod, asperiores cumque deleniti inventore! Dignissimos, explicabo libero! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, natus tenetur consequuntur, fugit, est sapiente deleniti nemo optio deserunt perspiciatis recusandae asperiores consequatur incidunt totam et tempore temporibus assumenda aliquid?</p>
                </div>

            </article>
            <article id="article-three">
                <div class="text">
                    <h3 class="">Services</h3>
                    <p class="text-explanation">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, asperiores non eligendi autem sint aperiam error laborum vel. Dicta voluptas officia corporis dolorem vitae enim eaque est eius, doloribus atque!</p>
                </div>
            </article>
            <article id="article-three">
                <div class="text" >
                    <h3 style="text-align:center">About</h3>
                    <p class="text-explanation">The Dapitan Health Center is a medical center located in the Metropolitan Manila area. The Dapitan Health Center is conveniently located next to Barangay 520, the Dapitan Public Library, and the Zone 51 Hall.
                        To better serve the public citizens, we offer medical care that is both high-quality and reasonably priced. General medicine, family planning, vaccines, and laboratory services are some of the many services that we provide.
                        </p>
                 </div>
         
            </article>

            
        </section>
      
        
        <footer>

        </footer>
    </body>
    </html>
    
