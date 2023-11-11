<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *,
        ::before,
        ::after {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }


        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .font-sans {
            font-family: Figtree, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        body {
            margin: 0;
            line-height: inherit;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .font-bold {
            font-weight: 700;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-center {
            text-align: center;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .text-right {
            text-align: right;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .p-2 {
            padding: 0.5rem;
        }

        .w-24 {
            width: 6rem;
        }

        .h-24 {
            height: 6rem;
        }

        .object-contain {
            -o-object-fit: contain;
            object-fit: contain;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .w-full {
            width: 100%;
        }

        .h-full {
            height: 100%;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            vertical-align: middle;
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .border {
            border-width: 1px;
        }

        .break-inside-avoid {
            -moz-column-break-inside: avoid;
            break-inside: avoid;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="py-6 text-3xl font-bold uppercase text-center">
        NITA Details Confirmation
    </div>

    <table class="w-full border print-friendly border-collapse" cellspacing="0">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3"></th>
                <th class="p-3" colspan="2">Name/ID/Trade/Series</th>
                <th class="p-3">Grade/Testing Center</th>
                <th class="p-3">Signature & Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr class="">
                    <td class="text-right p-3 border bg-gray-50" v-text="serial"></td>
                    <td class="border bg-gray-100">
                        <div class="w-24 h-24 p-2 ">
                            <img class="w-full h-full object-contain rounded-lg" src="{{ $candidate->photo }}" />
                        </div>
                    </td>
                    <td class="border p-3 bg-gray-100 break-inside-avoid">
                        <div class="text-base font-semibold">{{ $candidate->candidateName }}</div>
                        <div class="text-sm text-gray-700"><span class="font-semibold">ID Number: </span><span
                                v-text="">{{ $candidate->idNumber }}</span>
                        </div>
                        <div class="text-sm text-gray-700"><span class="font-semibold">Trade: </span><span
                                v-text="">({{ $candidate->trade->code }}) {{ $candidate->trade->name }}</span>
                        </div>
                        <div class="text-sm text-gray-700"><span class="font-semibold">Series: </span><span
                                v-text="series">{{ $candidate->series }}</span>
                        </div>
                    </td>
                    <td class="text-gray-700 p-3 border bg-gray-50">
                        <div><span class="text-sm font-bold">Grade: </span><span
                                v-text="grade">{{ $candidate->grade }}</span></div>
                        <div class="flex flex-col"><span class="text-sm font-bold">Testing Center: </span><span
                                v-text="testingCentre">{{ $candidate->testingCentre }}</span></div>
                    </td>
                    <td class="border p-3 bg-gray-100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
