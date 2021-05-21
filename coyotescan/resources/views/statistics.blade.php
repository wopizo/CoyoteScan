@extends("layouts.app")

@section("title")Статистика@endsection

@section("content")
    <form action="{{ route('statisticsPage') }}" method="get">
        <div class="form-group">
            <label for="search">Поиск</label>
            <input type="text" class="form-control" id="search" name="search">
        </div>
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

        <div class="form-group">
            <label for="step">Уникальным считать пешехода, прошедшего раз в:</label>
            <input type="number" class="form-control" id="step" name="stepval" value="5">
            <select class="form-select" aria-label="Default select example" name="steptype">
                <option value="1" selected>Минут</option>
                <option value="2">Часов</option>
                <option value="3">Дней</option>
                <option value="4">Недель</option>
                <option value="5">Месяцев</option>
                <option value="6">Лет</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Адрес</th>
            <th scope="col">Пешеходов</th>
        </tr>
        </thead>
        <tbody>
        @isset($data)
            @foreach($data as $station)
                <tr>
                    <td>{{ $station['address'] }}</td>
                    <td>{{ $station['count'] }}</td>
                </tr>
            @endforeach
        @endisset
        </tbody>
    </table>

@endsection
