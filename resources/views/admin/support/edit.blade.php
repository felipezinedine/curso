<h1>Edição do Registro {{$support->id}}</h1>

<hr>

<a href="{{route('support.index')}}">Voltar</a>

<h3>Formulário de Edição</h3>

<hr>
@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
    <hr>
@endif



<form action="{{route('support.update', $support->id)}}" method="POST">
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{$support->subject}}">
    <select name="status">
        <option value="a">ATIVO</option>
        <option value="p">PENDENTE</option>
        <option value="c">CONCLUÍDO</option>
    </select>
    <textarea name="body" cols="30" rows="5" placeholder="Conteúdo">{{$support->body}}</textarea>
    <button type="submit">Atualizar</button>
</form>
