@extends('layouts.siderbar')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                 @if (session('error'))
                     <h3 class="text-rose text-center">{{session('error')}}</h3>
                    
                 @endif
            </div>
        </div>
        <div class="flex-contain">
             <div class="contain">
                <img src="{{asset('storage/images/'.$produit->image)}}"  alt="product-img">
             </div>
             <div class="flex-item">
                 <h2>{{$produit->nom}}</h2>
                 <p><strong>Catégorie:</strong> {{$produit->categories->nom}}</p>
                 <p><strong>Quantité en stock:</strong> {{$produit->quantite}}</p>
                 <p><strong>Date de creation:</strong> {{$produit->created_at}}</p>
                 <p><strong>Mise à jour le :</strong> {{$produit->updated_at}}</p>
                 <p><strong>Prix unitaire:</strong> {{$produit->prix}}</p>
                 <p><strong>Description:</strong> {{$produit->description}}</p>
                 @if (Auth::user()->type==1)
                 <div class="row">
                    <div class="col-md-12 d-flex align-item-cemter">
                      <form action="{{route('produits.destroy',$produit->id)}}" method="post" >
                        @csrf
                        @method('DELETE')
                        <a href="{{route('produits.edit',$produit->id)}}" class="btn btn-warning btn-sm mx-2">Editer</a>
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                 </div>
                 @else
                 <button class="open-modal js-open-modal btn btn-success btn-md">commander</button>
                 <a href="{{route('home')}}" class="btn btn-rose">Retour</a>
                 <div class="container js-container-modal">
                    <form action="{{route('commande.store',$produit->id)}}" method="POST">
                        @csrf
                      <h1>Entrer la quantité de la commande</h1>
                      <input type="number" name="quantite">
                      <div class="container-buttons">
                        <button type="submit">Confirmer</button>
                        <button type="reset">Annuler</button>
                      </div>
                    </form>
                  </div>
                 @endif
                 
             </div>
        </div>
    </div>
</div>
<script>
    const openModal = document.querySelector('.js-open-modal');
    const conatainerModal = document.querySelector('.js-container-modal');
    const closeModal = document.querySelector('button[type="reset"]');
    
    closeModal.addEventListener('click', () => {
        conatainerModal.classList.remove('active');
    });

    openModal.addEventListener('click', () => {
        conatainerModal.classList.add('active');
    });

</script>
<style>
    .flex-contain{
    display: flex;
    flex-direction: row;
    gap: 20px;
    justify-content: center;
    align-items: center;
    }
    .contain{
       
        height: 26em;
        flex: 1;
        box-shadow: 6px 6px 10px rgb(187, 186, 186);
        border-radius: 10px;
        overflow: hidden;
    }
    .contain img{   
        width: 100%;
        height:100%;
        object-fit: contain;
        object-position: center;
    }
    .flex-item{
        flex: 2;
    }

    .container {
	display: none;
	align-items: center;
	flex-direction: column;
	justify-content: center;
	position: absolute;
	height: 100%;
	width: 100%;
	top: 0;
    left: 0;
	z-index: 100;
	background-color: rgba(0, 0, 0, 0.5);
  transition: 60ms linear;
  
}

.container.active{
  display: flex;
}

.container form {
	display: flex;
	align-items: center;
	flex-direction: column;
	row-gap: 0.5rem;
	width: 31.25rem;
	background-color: #fff;
	padding: 2rem;
  animation: opacityAnime 200ms forwards;
}
@keyframes opacityAnime{
  0%{
    opacity: 0;
  }
  100%{
    opacity: 1;
  }
}
form h1 {
	font-size: 1.1rem;
	text-transform: uppercase;
	font-weight: 300;
}

form input {
	width: 100%;
	padding: 5px;
	border: none;
	outline: none;
	position: relative;
	border-bottom: 1px solid rgba(0, 0, 0, 0.5);
}

.container-buttons {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 1rem;
	margin-top: 1rem;
}

.container-buttons button {
	border: none;
	padding: 0.5rem 1rem;
	font-size: 15px;
  font-weight: bold;
	cursor: pointer;
  color: #fff;
}

.container-buttons button[type='submit'] {
  background-color:rgb(8, 228, 8);
}

.container-buttons button[type="reset"]{
  background-color: rgb(219, 5, 5);
}

</style>
@endsection