<h1>Adicionar novo Registro</h1>

<hr>
<a href="{{route('support.index')}}">Voltar</a>

<hr>

@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
    <hr>
@endif


<form action="{{route('support.store')}}" method="POST">
    @csrf
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" cols="30" rows="5" placeholder="Conteúdo"></textarea>
    <button type="submit">Adicionar</button>
</form>
