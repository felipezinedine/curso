<h1>Registro de Número {{$support->id}}</h1>

<hr>

<a href="{{route('support.index')}}">Voltar</a>

<ul>
       <li>Assunto: {{$support->subject}}</li>
            @if ($support->status === 'a')
                <li>Status: ATIVO</li>
            @elseif ($support->status === 'p')
                <li>Status: PENDENTE</li>
            @else
                <li>Status: CONCLUÍDO</li>
             @endif
                <li>Conteúdo: {{$support->body}}</li>
</ul>

<hr>

<form action="{{route('support.delete', $support->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
