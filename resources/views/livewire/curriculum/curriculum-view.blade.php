<div>
    <x-page-header>Curriculum</x-page-header>

    <div class="grid gap-5 grid-col-3 md:grid-cols-2 lg:grid-cols-3 ">
        <x-card body="Accreditation status of academic programs"
            :button="true"
            href="{{ route('curriculum-accreditation.index') }}"
            buttonText="View list"
        />

        <x-card body="Academic programs with government Recognition (CoPC)"
            :button="true"
            href="{{ route('curriculum-academic.index') }}"
            buttonText="View list"
        />

        <x-card body="Performance in the licensure examination"
            :button="true"
            href="{{ route('curriculum-performance.index') }}"
            buttonText="View list"
        />

        <x-card body="List of faculty members with national TVET"
            :button="true"
            href="{{ route('curriculum-national-tvet.index') }}"
            buttonText="View list"
        />

        <x-card body="Number of students with national TVET qualitfication and certifications"
            :button="true"
            href="{{ route('curriculum-num-national-tvet.index') }}"
            buttonText="View list"
        />
    </div>

</div>
