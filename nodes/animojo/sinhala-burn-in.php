<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $meta_preset = [
        'title' => 'සිංහල උපසිරැසි ගැන්වූ ඇනිමෙ - Sinhala Subtitle Burn-in Anime',
        'description' => 'සිංහල උපසිරැසි ගැන්වූ ඇනිමෙ බලන්න ඩිරෙක්ට් ඩවුන්ලෝඩ් කරන්න',
        'keywords' => [
            "anime with sinhala subtitles",
            "සිංහල උපසිරැසි",
            "anime sinhala",
            "sinhala subtitles",
            "download sinhala subtitles",
            "ඇනිමෙ"
        ]
    ];
    include 'layout/meta/def.php' ?>
</head>

<body>
    <?php include 'layout/header/def.php' ?>
    <div class="content-wraper">
        <div class="content">
            <section>
                <div class="section-title">
                    <h1>Sinhala Subtitle Burn-in Anime</h1>
                </div>
                <?php
                include '_inc/function.php';
                load_subtitle_data();
                $sub_ids = [];
                foreach ($subtitle_data['subtitles'] as $e) {
                    foreach ($e['sub'] as $s) {
                        if ($s['lan'] === 'si') {
                            foreach ($e['id'] as $id) {
                                $sub_ids[$id] = true;
                            }
                            break;
                        }
                    }
                }
                $result = array_reverse(array_filter($main_data, function ($e) use ($sub_ids) {
                    return isset($sub_ids[$e['movie_id']]) && $e['subtitle'] === 'hard';
                }));
                echo '<div class="movie-cards-container">';
                $max_per_page = 30;
                $page = (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= count($result) / $max_per_page + 1) ? (int) $_GET['page'] : 1;
                $start_index = ($page * $max_per_page) - $max_per_page;
                for ($i = $start_index; $i < $page * $max_per_page && $i < count($result); $i++) {
                    load_card($result[$i]);
                }
                echo '</div>';
                print_bottom_nav(count($result), $max_per_page, $page, $_SERVER['REQUEST_URI']); ?>
            </section>

            <div class="r-panel">
                <?php
                include 'layout/sidebar/genres.php';
                include 'layout/sidebar/new.php';
                ?>
            </div>
        </div>
    </div>
    <?php include 'layout/footer/def.php' ?>
</body>

</html>