@extends("layouts.app")

@section("title")Статистика@endsection

@section("content")
    <form action="{{ route('macAddressStatisticsPage', $id) }}" method="get">
        <div class="form-group">
            <label for="timeStart">Время от</label>
            <input type="datetime-local" class="form-control" id="timeStart" name="timeStart">
        </div>
        <div class="form-group">
            <label for="timeFinish">Время до</label>
            <input type="datetime-local" class="form-control" id="timeFinish" name="timeFinish">
        </div>
        <div class="form-group">
            <label for="marked">Только отмеченные</label>
            <input type="checkbox" class="form-control" id="marked" name="marked">
        </div>

        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Адрес</th>
            <th scope="col">Время</th>
            <th scope="col">Пешеходы</th>
        </tr>
        </thead>
        <tbody>
        @isset($data)
            @foreach($data as $record)
                <tr>
                    <td>{{ $record['address'] }}</td>
                    <td>{{ $record['time'] }}</td>
                    <td>
                        @foreach($record['mac_addresses'] as $address)
                            {{ $address }}<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>

@endsection
