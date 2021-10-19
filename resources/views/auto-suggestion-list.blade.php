    <ul>
        @foreach($registers as $register)
            @if($register->national_id)
                <li>
                    <a href="{{ route('search.register', $register->national_id) }}">
                        {{ $register->national_id }}
                    </a>
                </li>

            @elseif($register->birth_registration)
                <li>
                    <a href="{{ route('search.register', $register->birth_registration) }}">
                        {{ $register->birth_registration }}
                    </a>
                </li>
            @elseif($register->ssc_registration_no)
                <li>
                    <a href="{{ route('search.register', $register->ssc_registration_no) }}">
                        {{ $register->ssc_registration_no }}
                    </a>
                </li>
            @elseif($register->national_id)
                <li>
                    <a href="{{ route('search.register', $register->hsc_registration_no) }}">
                        {{ $register->hsc_registration_no }}
                    </a>
                </li>
            @else
            @endif
        @endforeach
    </ul>
