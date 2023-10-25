<?php

namespace Database\Seeders;

use App\Models\AuthorityMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorityMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuthorityMessage::create([
            'authority_type'=>'Secretary',
            'authority_name'=>'Advocate Jahangir Kabir Nanok',
            'authority_message'=>'It is a great pleasure for me that Global University Bangladesh is going to launch its academic programmers’ with a view to creating well equipped, well-disciplined and outstanding leaders for the growing public and private sectors and for building a knowledge and technology based nation.

            I feel immensely proud that I remain actively with the establishment of this university. This university will play a pivotal role in expanding quality and standard education, creating efficient competent and dynamic professionals and building a digitalized, technology based and humanitarian nation.

            I must believe that the illuminating birth of this university is to pay a profound homage to our sacrificed hearts who remain eternally in our heart and their fulfillment of dream. The southern part of our country lags behind because of the shortage of universities, the limitations of opportunities to be efficient and dynamic and the lack of higher education that creates leadership. So, this university will eliminate this type of deficits with its outstanding and dynamic performance. I also do believe that this small piece of land is the fossil of our ancestors and this university will be an illuminating lighthouse on this land that will enlighten its surroundings.

            I hope that Global University Bangladesh will go ahead with its radiance and dynamism and will achieve a prestigious cliff for quality and standard education.',
          
        ]);
        AuthorityMessage::create([
            'authority_type'=>'Chairman',
            'authority_name'=>'Sayeda Arjuman Banu Nargis',
            'authority_message'=>'I am immensely pleased to be one of the pioneering founders of Global University Bangladesh Which will play a pivotal role in making  efficient, dynamic, innovative, creative and competent leaders for public and private sectors and for the formation of knowledge and technology based Bangladesh and humanitarian society.

            Global University Bangladesh will be and will remains as an hub of excellence in higher education, a centre of free thinking and a gathering of cultural and literary heritage. It will gain prestige and recognition nationally and globally and will be an attraction for the students, teachers, researchers and academicians of Bangladesh and the globe,

            Our university will produce competent graduates in their selected disciplines who will have productive careers or will choose to engage in advanced studies. Our students will be life-long learners with good leadership skills, more efficient in oral, written and electronic communication, critical thinkers of well-developed analytical skills, ethically and socially responsible, champion of diversity and tolerance and globally aware with commitment to social justice and sustainability.

            I take pride to remain with an educational institution which will nurture individual excellence and dignity as well as charitable, non-profitable and philanthropic approach to society.',

        ]);
        AuthorityMessage::create([
            'authority_type'=>'President',
            'authority_name'=>'Prof. Dr.Anisuzzaman',
            'authority_message'=>'It is a great pleasure for me that Global University Bangladesh is going to exert its philanthropic initiative with the beginning of academic program. This university will provide the students an effective and efficient way to develop the art of learning, the communicative and technological efficiencies and the supremacy of leadership.

            Global University Bangladesh is going to open a golden opportunity that offers socially relevant academic program consisting of a substantial general education component. This university will also provide effective teaching, quality research and outstanding service with appropriate physical facilities. The practice of good governance and the skilled administration will encourage academic freedom and intimate   relation between teachers and students.

            I do believe this university is the manifestation of paying homage to the great philanthropists who sacrificed themselves for our freedom, emancipation and the betterment of Golden Bangladesh

            I feel proud to remain with this academic institution which will be the center of communication and information technology. I hope this university will go ahead with success.',

        ]);
    }
}
