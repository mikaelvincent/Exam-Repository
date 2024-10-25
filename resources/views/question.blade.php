<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>$question-&gt;label | $examSet-&gt;name | $examSet-&gt;name | $examSet-&gt;name</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/css/text-transform-none.css">
</head>

<body>
    <nav>
        <div class="container py-4 py-xl-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="#"><span>Home</span></a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="$examSet->slug"><span>$examSet-&gt;name</span></a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="$examSet->slug"><span>$examSet-&gt;name</span></a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="$examSet->slug"><span>$examSet-&gt;name</span></a></li>
                <li class="breadcrumb-item active"><span>$question-&gt;name</span></li>
            </ol>
        </div>
    </nav>
    <main>
        <div class="container pb-4 pb-xl-5">
            <div class="row">
                <div class="col-12 col-lg-8 order-lg-last">
                    <div class="row mb-5">
                        <div class="col">
                            <div class="fs-3 lead">
                                <p>$question-&gt;content</p>
                            </div><img class="img-fluid" src="$question->image_src" alt="$question->image_alt">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="row gy-3 row-cols-1 mb-5" id="answers">
                        <div class="col"><button class="btn btn-outline-primary btn-lg w-100 py-4 text-transform-none" type="button"></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg w-100 py-4 text-transform-none" type="button"><span class="d-block">$answer-&gt;label</span></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg w-100 py-4 text-transform-none" type="button"><span class="fw-normal d-block">$answer-&gt;content</span></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg w-100 py-4 text-transform-none" type="button"><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg text-start w-100 py-4 text-transform-none" type="button"><span class="d-block">$answer-&gt;label</span><span class="fw-normal d-block">$answer-&gt;content</span></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg text-start w-100 py-4 text-transform-none" type="button"><span class="d-block">$answer-&gt;label</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg text-start w-100 py-4 text-transform-none" type="button"><span class="fw-normal d-block">$answer-&gt;content</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg text-start w-100 py-4 text-transform-none" type="button"><span class="d-block">$answer-&gt;label</span><span class="fw-normal d-block">$answer-&gt;content</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-outline-primary btn-lg disabled text-start w-100 py-4 text-transform-none" type="button" disabled=""><span class="d-block">$answer-&gt;label (full progress)</span><span class="fw-normal d-block">$answer-&gt;content</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-danger btn-lg disabled text-start w-100 py-4 text-transform-none" type="button" disabled=""><span class="d-block">$answer-&gt;label (submitted, wrong)</span><span class="fw-normal d-block">$answer-&gt;content</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                        <div class="col"><button class="btn btn-success btn-lg disabled text-start w-100 py-4 text-transform-none" type="button" disabled=""><span class="d-block">$answer-&gt;label (submitted, correct)</span><span class="fw-normal d-block">$answer-&gt;content</span><img class="img-fluid d-block mt-2" alt="$answer->image_alt" src="$answer->image_src"></button></div>
                    </div>
                    <hr class="mb-5">
                    <div class="row gy-3 row-cols-1 mb-5">
                        <div class="col">
                            <form><button class="btn btn-success btn-lg disabled w-100" id="submit-answer" type="button" disabled="">Submit</button></form>
                        </div>
                        <div class="col">
                            <div class="modal fade" role="dialog" tabindex="-1" id="explanations">
                                <div class="modal-dialog modal-fullscreen" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fw-bold">$examSet-&gt;name /&nbsp;$examSet-&gt;name /&nbsp;$examSet-&gt;name /&nbsp;$question-&gt;label</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>$explanation-&gt;content</p>
                                        </div>
                                        <div class="modal-footer text-bg-dark d-flex justify-content-center">
                                            <div class="me-sm-auto"><button class="btn btn-link btn-sm" id="prev-explanation" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-left fs-3">
                                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"></path>
                                                    </svg></button><span class="fs-5"><span id="current-explanation-index">2</span>&nbsp;/&nbsp;<span id="total-explanations">2</span></span><button class="btn btn-link btn-sm disabled" id="next-explanation" type="button" disabled=""><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chevron-right fs-3">
                                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                                                    </svg></button></div><button class="btn btn-primary btn-lg" id="generate-new-explanation" type="button">Generate New Explanation</button><button class="btn btn-secondary btn-lg d-none d-sm-flex" type="button" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div><button class="btn btn-outline-primary btn-lg w-100" type="button" data-bs-target="#explanations" data-bs-toggle="modal">See Explanation</button>
                        </div>
                        <div class="col"><button class="btn btn-primary btn-lg w-100" type="button">Next Question</button></div>
                        <div class="col"><button class="btn btn-outline-success btn-lg w-100" type="button">Next Question (next question full progress)</button></div>
                        <div class="col"><button class="btn btn-primary btn-lg w-100" type="button">Back to Overview</button></div>
                        <div class="col"><button class="btn btn-outline-success btn-lg w-100" type="button">Back to Overview (exam set full progress)</button></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/answersInteraction.js"></script>
    <script src="assets/js/explanationsInteraction.js"></script>
</body>

</html>
