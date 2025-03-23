<x-layout>
    <header class=mt-5>

        <!-- title -->

        <div class="container-fluid col-12 col-md-12 p-5 bg-title text-center text-dark">
            <div class="row justify-content-center">
                <h1 class="bg-text">
                    AGGIUNGI PROMOZIONI
                </h1>
            </div>
        </div>

    </header>

    <main>


       <!-- <div class="container-fluid h-200 d-flex flex-column justify-content-center align-items-center ">
            <div class="row">
                <div class="col-12">
                    <h3 class="nunito-text">aggiungi promozioni</h3>
                </div>
            </div>
        </div> -->

        <div class="container d-flex flex-column justify-content-center align-items-center mb-80px nunito-text">
            <div class="settings-container-md">
                <form method="POST" action="{{route('promotions_store')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label  ">
                                <h5 class="">immaggine di copertina</h5>
                            </label>
                            <input name="img" class="form-control bg-color-transparent-cream custom-input" type="file"
                                id="formFile">
                            @if ($errors->has('img'))
                            <div class="text-danger">{{ $errors->first('img') }}</div>
                            @endif
                        </div>
                        <div>
                            <h5 class="mt-3">titolo</h5>
                            <input name="title" class="form-control bg-color-transparent-cream custom-input" id="titolo"
                                type="text" placeholder="inserisci titolo" aria-label="default input example">
                            @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div>
                            <h5 class="mt-3">descrizione</h5>
                            <div class="form-floating">
                                <textarea name="description" id="description"
                                    class="form-control bg-color-transparent-cream custom-input"
                                    placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">inserisci la descrizione</label>
                                @if ($errors->has('description'))
                                <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class=" btn button-login mt-3" id="btnAddCard">conferma</button>
                    </div>
                </form>
            </div>
        </div>




    </main>







</x-layout>