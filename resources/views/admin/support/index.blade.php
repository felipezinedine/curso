<h1>Listagem de Registros</h1>

    @if (isset($supports) && $supports != null)
            <form action="{{route('support.index')}}" method="GET">
                <input type="text" name="filter" placeholder="pesquisar">
            </form>
            <a href="{{route('support.create')}}">Adicionar tarefa</a>
    @else
        Clique aqui para <a href="{{route('support.create')}}">adicionar uma tarefa</a>
    @endif

    <hr>

    @if (isset($supports) && $supports != null)
        <table>
            <thead>
                <th>Assunto</th>
                <th>Status</th>
                <th>Descrição</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($supports as $support)
                    <tr>
                        <td>{{$support['subject']}}</td>

                        @if ($support['status'] === 'a')
                        <td>ATIVO</td>
                        @elseif ($support['status'] === 'p')
                        <td>PENDENTE</td>
                        @else
                        <td>CONCLUÍDO</td>
                        @endif

                        <td>{{$support->body}}</td>

                        <td>
                            <a href="{{route('support.show', $support['id'])}}"> Ver </a> |
                            <a href="{{route('support.edit', $support['id'])}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
