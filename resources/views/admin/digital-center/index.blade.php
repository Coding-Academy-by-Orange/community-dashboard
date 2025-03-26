@extends('layouts.admin')

@section('title')
    Digital Center Trainers
@endsection

@section('main')
    <div class="container my-5">
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <!-- Header Section -->
                <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="display-3">Digital Center Trainers</h3>
                    </div>
                    <div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table-sm trainer-table table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trainer Name</th>
                                    <th>Trainer_Phone</th>
                                    <th>Email</th>
                                    <th>Organization</th>
                                    <th>Digital Center</th>
                                    <th>Governorate</th>
                                    <th>Courses</th>
                                    <th>Career Months</th>
                                    <th>Career Days</th>
                                    <th>Career Topics</th>
                                    <th>Soft Months</th>
                                    <th>Soft Days</th>
                                    <th>Soft Topics</th>
                                    <th>Digital Months</th>
                                    <th>Digital Days</th>
                                    <th>Digital Topics</th>
                                    <th>Entre Months</th>
                                    <th>Entre Days</th>
                                    <th>Entre Topics</th>
                                    <th>Freelance Months</th>
                                    <th>Freelance Days</th>
                                    <th>Freelance Topics</th>
                                    <th>Other Months</th>
                                    <th>Other Days</th>
                                    <th>Other Topics</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainers as $trainer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trainer->trainer_name }}</td>
                                        <td>{{ $trainer->trainer_phone }}</td>
                                        <td>{{ $trainer->trainer_email }}</td>
                                        <td>{{ $trainer->organization }}</td>
                                        <td>{{ $trainer->digital_center }}</td>
                                        <td>{{ $trainer->governorate }}</td>

                                        <!-- Courses -->
                                        <td>
                                            @if ($trainer->courses && is_array($trainer->courses) && count($trainer->courses) > 0)
                                                <ul>
                                                    @foreach ($trainer->courses as $course)
                                                        <li>{{ $course }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد دورات
                                            @endif
                                        </td>

                                        <!-- Career Planning -->
                                        <td>
                                            @if ($trainer->career_months && is_array($trainer->career_months) && count($trainer->career_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->career_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->career_days ?? 'لا يوجد' }}</td>
                                        <td>
                                            @if ($trainer->career_topics && is_array($trainer->career_topics) && count($trainer->career_topics) > 0)
                                                <ul>
                                                    @foreach ($trainer->career_topics as $topic)
                                                        <li>{{ $topic }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td>

                                        <!-- Soft Skills -->
                                        <td>
                                            @if ($trainer->soft_months && is_array($trainer->soft_months) && count($trainer->soft_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->soft_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->soft_days ?? 'لا يوجد' }}</td>
                                        <td>
                                            @if ($trainer->topics && is_array($trainer->topics) && count($trainer->topics) > 0)
                                                <ul>
                                                    @foreach ($trainer->topics as $topic)
                                                        <li>{{ $topic }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td>

                                        <!-- Digital Culture -->
                                        <td>
                                            @if ($trainer->digital_months && is_array($trainer->digital_months) && count($trainer->digital_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->digital_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->digital_days ?? 'لا يوجد' }}</td>
                                        <td>
                                            @if ($trainer->digital_topics && is_array($trainer->digital_topics) && count($trainer->digital_topics) > 0)
                                                <ul>
                                                    @foreach ($trainer->digital_topics as $topic)
                                                        <li>{{ $topic }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td>

                                        <!-- Entrepreneurship -->
                                        <td>
                                            @if ($trainer->entre_months && is_array($trainer->entre_months) && count($trainer->entre_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->entre_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->entre_days ?? 'لا يوجد' }}</td>
                                        <td>
                                            @if ($trainer->entre_topics && is_array($trainer->entre_topics) && count($trainer->entre_topics) > 0)
                                                <ul>
                                                    @foreach ($trainer->entre_topics as $topic)
                                                        <li>{{ $topic }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td>

                                        <!-- Freelancing -->
                                        <td>
                                            @if ($trainer->freelance_months && is_array($trainer->freelance_months) && count($trainer->freelance_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->freelance_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->freelance_days ?? 'لا يوجد' }}</td>
                                        <td>
                                            @if ($trainer->freelance_topics && is_array($trainer->freelance_topics) && count($trainer->freelance_topics) > 0)
                                                <ul>
                                                    @foreach ($trainer->freelance_topics as $topic)
                                                        <li>{{ $topic }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td>

                                        <!-- Other Topics -->
                                        <td>
                                            @if ($trainer->other_months && is_array($trainer->other_months) && count($trainer->other_months) > 0)
                                                <ul>
                                                    @foreach ($trainer->other_months as $month)
                                                        <li>شهر {{ $month }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                لا توجد أشهر
                                            @endif
                                        </td>
                                        <td>{{ $trainer->other_days ?? 'لا يوجد' }}</td>
                                        <!-- <td>
                                            @if ($trainer->other_topics && is_string($trainer->other_topics))
                                                <p>{{ $trainer->other_topics }}</p>
                                            @else
                                                لا توجد مواضيع
                                            @endif
                                        </td> -->
                                        <td>{{ $trainer->other ?? 'لا يوجد' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $(".trainer-table").DataTable({
                searchBuilder: true,
                searchPanes: {
                    columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15] // Include all relevant columns
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            orthogonal: 'export'
                        }
                    },
                    {
                        extend: 'csv',
                        charset: 'utf-8', // Ensure proper encoding for Arabic
                        bom: true, // Add BOM for Excel compatibility
                        exportOptions: {
                            orthogonal: 'export'
                        }
                    },
                    {
                        extend: 'excel',
                        charset: 'utf-8', // Ensure proper encoding for Arabic
                        bom: true, // Add BOM for Excel compatibility
                        exportOptions: {
                            orthogonal: 'export'
                        }
                    },
                    {
                        extend: 'pdf',
                        charset: 'utf-8', // Ensure proper encoding for Arabic
                        exportOptions: {
                            orthogonal: 'export'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            orthogonal: 'export'
                        }
                    }
                ],
                columnDefs: [
                    {
                        targets: '_all', // Apply to all columns
                        render: function(data, type, row, meta) {
                            if (type === 'export') {
                                // Convert arrays (JSON) into comma-separated strings for export
                                try {
                                    let parsedData = JSON.parse(data);
                                    if (Array.isArray(parsedData)) {
                                        return parsedData.join(', ');
                                    }
                                } catch (e) {
                                    // Not JSON, return as-is
                                }
                                return data;
                            }
                            return data;
                        }
                    },
                    {
                        targets: [-2], // Format the "Other Details" column if needed
                        render: function(data, type, row, meta) {
                            if (type === 'display' && data.length > 50) {
                                return data.substring(0, 50) + '...';
                            } else {
                                return data;
                            }
                        }
                    }
                ]
            });

            table.buttons().container().appendTo(table.table().container());
            table.searchBuilder.container().prependTo(table.table().container());
            $("div.dtsp-verticalPanes").append(table.searchPanes.container());
        });
    </script>
@endsection