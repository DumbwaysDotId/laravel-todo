<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
        />

        <title>Todo App</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container">
                <a class="navbar-brand" href="#">Todo App</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <li class="nav-item">
                            <span class="nav-link active">{{ auth()->user()->name }},</span>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="nav-link btn btn-dark btn-sm py-0 text-light">Logout</button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row pt-5">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="mb-3 text-end">
                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#add-modal"
                        >
                            Add
                        </button>
                    </div>
                    @foreach ($todos as $todo)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4>{{$todo->title}}</h4>
                            <p class="m-0 mb-4">{{$todo->desc}}</p>
                            <form
                                action="/destroy/{{$todo->id}}"
                                method="post"
                                class="d-inline"
                            >
                                @method('delete') @csrf
                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                            <button
                                class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#update-modal-{{$todo->id}}"
                            >
                                Update
                            </button>
                        </div>
                    </div>
                    <div
                        class="modal fade"
                        id="update-modal-{{$todo->id}}"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="/update" method="post">
                                    @method('patch') @csrf
                                    <div class="modal-header">
                                        <h5
                                            class="modal-title"
                                            id="exampleModalLabel"
                                        >
                                            Update Todo
                                        </h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                    </div>
                                    <div class="modal-body">
                                        <input
                                            type="hidden"
                                            value="{{$todo->id}}"
                                            name="id"
                                        />
                                        <div class="mb-3">
                                            <label
                                                for="exampleFormControlInput1"
                                                class="form-label"
                                                >Title</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleFormControlInput1"
                                                value="{{$todo->title}}"
                                                name="title"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleFormControlTextarea1"
                                                class="form-label"
                                                >Description</label
                                            >
                                            <textarea
                                                class="form-control"
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                                name="desc"
                                                >{{$todo->desc}}</textarea
                                            >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary btn-sm"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div
                class="modal fade"
                id="add-modal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/create" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Add Todo
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="form-label"
                                        >Title</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="exampleFormControlInput1"
                                        placeholder="..."
                                        name="title"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="exampleFormControlTextarea1"
                                        class="form-label"
                                        >Description</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                        name="desc"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary btn-sm"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-sm"
                                >
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
