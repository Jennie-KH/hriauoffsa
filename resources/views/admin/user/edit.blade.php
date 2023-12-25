@extends('template.master')
@section('title', 'User')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a class="btn btn-dark btn-sm" href="/users">ថយក្រោយ</a></h5>
        </div>
        <div class="card-body">
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                {{-- img --}}
                <div class="row">
                    <div class="col"></div>
                    <div class="col d-flex justify-content-center">
                        <label for="image" id="im">
                            <input type="file" class="file-upload" name="img" id="image" style="display: none" />
                            <div class="circle">
                                @if ($user->image)
                                    <img src="{{ asset('images/' . $user->image) }}" alt="" width="100%">
                                @else
                                    <img class="profile-pic"
                                        src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg"
                                        width="100%" />
                                @endif

                            </div>

                            @error('img')
                                <div>{{ $message }}</div>
                            @enderror

                        </label><br />
                    </div>
                    <div class="col"></div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">អត្តលេខ</label>
                            <input type="text" name="idCard" value="{{ $user->idCard }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="អត្តលេខ">
                            @error('idCard')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                        <label for="exampleFormControlInput1">តួនាទី</label>
                        <div class="dropdown show">
                            <select id="active" class="form-control" name="roleId">
                                {{-- @foreach ($roles as $key => $role) --}}
                                <option value="{{ $user->roleId }}">{{ $user->role->roleNameKh }}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                        <label for="exampleFormControlInput1">នាយកដ្នាន</label>
                        <div class="dropdown show">
                            <select id="department" class="form-control" name="departmentId">
                                <option value="{{ $user->departmentId }}">{{ $user->department->departmentNameKh }}</option>
                                {{-- @foreach ($departments as $key => $department)
                                    <option value="{{ $department->id }}">{{ $department->departmentNameKh }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 pb-2">
                        <label for="exampleFormControlInput1">ការិយាល័យ</label>
                        <div class="dropdown show">
                            <select id="office" class="form-control" name="officeId">
                                <option>{{ $user->office->officeNameKh }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">នាមខ្លួន</label>
                            <input type="text" name="firstNameKh" value="{{ $user->firstNameKh }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="នាមខ្លួន">
                            @error('firstNameKh')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">នាមជីតា</label>
                            <input type="text" name="lastNameKh" value="{{ $user->lastNameKh }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="នាមជីតា">
                            @error('lastNameKh')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">អ៊ីម៉ែល</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="អ៊ីម៉ែល">
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ភេទ</label>
                            <select name="gender" class="form-control" id="exampleFormControlInput1"
                                value="{{ old('gender') }}">
                                <option value="m">ប្រុស</option>
                                <option value="f">ស្រី</option>
                                <option value="o">ផ្សេងៗ</option>
                            </select>
                            @error('gender')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">លេខទូរស័ព្ទ</label>
                            <input type="text" name="phoneNumber" value="{{ $user->phoneNumber }}"
                                class="form-control" id="exampleFormControlInput1" placeholder="លេខទូរស័ព្ទ">
                            @error('phoneNumber')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">លេខកូដ</label>
                            <input type="password" name="password" value="{{ $user->password }}" class="form-control"
                                id="exampleFormControlInput1" placeholder="លេខកូដ">
                            @error('password')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ថ្ងៃ-ខែ-ឆ្នាំ កំណើត</label>
                            <input type="date" name="dateOfBirth" value="{{ $user->dateOfBirth }}"
                                class="form-control" min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                max="{{ date('Y-m-d') }}" id="exampleFormControlInput1" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                            @error('dateOfBirth')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">សញ្ជាត្តិ</label>
                            <input type="text" name="nationality" value="{{ $user->nationality }}"
                                class="form-control" id="exampleFormControlInput1" placeholder="សញ្ជាត្តិ">
                            @error('nationality')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 mb-2">
                        <label for="exampleFormControlInput1">ទំនាក់ទំនង</label>
                        <div class="dropdown show">
                            <select id="active" class="form-control" name="status">
                                <option value="នៅលីវ">នៅលីវ</option>
                                <option value="ភ្ជាប់ពាក្យ">ភ្ជាប់ពាក្យ</option>
                                <option value="រៀបការ">រៀបការ</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ទីកន្លែងកំណើត</label>
                            <input type="text" name="pobAddress" value="{{ $user->pobAddress }}"
                                class="form-control" id="exampleFormControlInput1" placeholder="ទីកន្លែងកំណើត">
                            @error('pobAddress')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">ទីកន្លែងបច្ចុប្បន្ន</label>
                            <input type="text" name="currentAddress" value="{{ $user->pobAddress }}"
                                class="form-control" id="exampleFormControlInput1" placeholder="ទីកន្លែងបច្ចុប្បន្ន">
                            @error('currentAddress')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <br>
                <input type="submit" class="btn btn-primary btn-sm" value="ធ្វើបច្ចុប្បន្នភាព">
            </form>
        </div>
    </div>
@endsection
