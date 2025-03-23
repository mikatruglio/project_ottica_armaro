<x-layout>
    <header class=mt-5>

        <!-- title -->

        <div class="container-fluid col-12 col-md-12 p-5 bg-title text-center text-dark">
            <div class="row justify-content-center">
                <h1 class="bg-text">
                    PROMOZIONI
                </h1>
            </div>
        </div>

        <div class="bg-main-img">
        </div>

    </header>

    <main>

        <div
            class="container-fluid d-flex flex-column justify-content-center vh-custom mt-5 pb-md-50 shadow-2">
            <div class="row justify-content-custom">

                <!-- promotions description -->

                <div class="col-12 col-md-6 col-lg-4 nunito-text d-flex flex-column align-items-center ">
                    <div class="box-description">
                        <h3 class="home-text-color">Promozioni Ottica Armaro:</h3>
                        <p>
                       Abbiamo selezionato offerte speciali per garantirti la massima qualità al miglior prezzo. <br> Approfitta delle nostre promozioni per prenderti cura della tua vista con soluzioni innovative e convenienti. <hr class="home-text-color"> Non lasciarti sfuggire queste occasioni uniche e vieni a trovarci per trovare l'offerta perfetta per te! </p>
                    </div>
                </div>

                <!-- promotions img -->

                <div
                    class="col-12 col-md-6 col-lg-4 d-flex flex-column justify-content-custom align-items-center mb-sm-50">
                   
                          <p class="home-text-color d-flex justyfy-content-center align-items-center container-img-promotion-sm container-img-promotion-md">%</p>
                   

                </div>




            </div>
        </div>

        @if (session('message-success'))
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-success">

                        {{ session('message-success') }}
                    </div>
                </div>
            </div>
        </div>

        @endif
        @if (session('message-modify'))

        <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-success">

                        {{ session('message-modify') }}
                    </div>
                </div>
            </div>
        </div>

        @endif
        @if (session('message-delete'))
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="row">

                <div class="col-12">
                    <div class="alert alert-danger">

                        {{ session('message-delete') }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        <section class="mt-ms-50 mt-md-70 mb-70px">
        @foreach($promotions as $promotion)

           <div class="my-5">
            <div class="container container-promotions img-promotion"
                style="background-image: url('{{ Storage::url($promotion->img) }}')">
                <div class="row justify-content-center title-promotion">
                    <div class="col-12 d-flex flex-column justify-content-center text-start">
                        <h2>{{$promotion->title}}</h2>
                    </div>
                </div>
                <div class="row justify-content-center h200">
                    <div class="col-12 d-flex flex-column ">

                    </div>
                </div>
                <div class="row justify-content-center describe-promotion">
                    <div class="col-12 d-flex flex-column justify-content-center text-end ">

                        <p><strong>{{$promotion->description}}</strong></p>
                    </div>

                </div>
            </div>
            @can('admin-access')
            <div class="container container-edit mt-2">
                <div class="row">
                    <div class="col-6 d-flex flex-column jusctify-content-center align-items-center">
                        <a class="link-modify" href="{{ route('edit', $promotion->id) }}">modifica</a>
                    </div>
                    <div class="col-6 d-flex flex-column jusctify-content-center align-items-center">
                        <a class="link-delete" href="#"
                            onclick="event.preventDefault(); document.getElementById('form-delete-{{$promotion->id}}').submit();">elimina</a>
                        <form id="form-delete-{{$promotion->id}}" method="POST"
                            action="{{ route('delete', ['promotion' => $promotion->id]) }}" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
       </div>
        @endcan
        @endforeach
     </section>
    </main>




</x-layout>