@props([
    'studyTrack' => null,
    'levels' => [],
    'statuses' => [],
    'action',
    'method' => 'POST',
])

<form class="form-card" method="POST" action="{{ $action }}">
    @csrf
    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="form-grid">
        <div>
            <label for="title">Titulo</label>
            <input id="title" name="title" type="text" value="{{ old('title', $studyTrack?->title) }}" required>
            @error('title')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="area">Area</label>
            <input id="area" name="area" type="text" value="{{ old('area', $studyTrack?->area) }}" required>
            @error('area')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-grid">
        <div>
            <label for="level">Nivel</label>
            <select id="level" name="level" required>
                @foreach ($levels as $value => $label)
                    <option value="{{ $value }}" @selected(old('level', $studyTrack?->level ?? 'beginner') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('level')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select id="status" name="status" required>
                @foreach ($statuses as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', $studyTrack?->status ?? 'planned') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('status')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-grid">
        <div>
            <label for="target_hours">Horas planejadas</label>
            <input id="target_hours" name="target_hours" type="number" min="1" max="500" value="{{ old('target_hours', $studyTrack?->target_hours ?? 20) }}" required>
            @error('target_hours')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="completed_hours">Horas concluidas</label>
            <input id="completed_hours" name="completed_hours" type="number" min="0" max="500" value="{{ old('completed_hours', $studyTrack?->completed_hours ?? 0) }}" required>
            @error('completed_hours')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-grid">
        <div>
            <label for="start_date">Inicio</label>
            <input id="start_date" name="start_date" type="date" value="{{ old('start_date', $studyTrack?->start_date?->format('Y-m-d')) }}">
            @error('start_date')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="due_date">Prazo</label>
            <input id="due_date" name="due_date" type="date" value="{{ old('due_date', $studyTrack?->due_date?->format('Y-m-d')) }}">
            @error('due_date')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <label for="notes">Observacoes</label>
    <textarea id="notes" name="notes" rows="5">{{ old('notes', $studyTrack?->notes) }}</textarea>
    @error('notes')
        <p class="field-error">{{ $message }}</p>
    @enderror

    <div class="actions">
        <button class="button" type="submit">Salvar trilha</button>
        <a class="button button-secondary" href="{{ route('study-tracks.index') }}">Cancelar</a>
    </div>
</form>
