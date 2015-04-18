<div class="ten wide column">
	<h2>Information </h2>

<table class="ui very basic table">
	<tr>
		<td>No</td>
		<td><?php echo $surv['id']; ?></td>
	</tr>
	<tr>
		<td>Survey Name</td>
		<td><?php echo  $surv['name']; ?></td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date("m - d - Y ", strtotime($surv['date_created'])); ?></td>
	</tr>
	<tr>
		<td>Issued Date</td>
		<td><?php if(date("m - d - Y ", strtotime($surv['date_issued'])) > "01 - 01 - 2000")
                                echo date("m - d - Y ", strtotime($surv['date_issued']));
                              else
                                  echo "N/A"; ?>  </td>
	</tr>
	<tr>
		<td>Status </td>
		<td><?php echo $surv['status']; ?></td>
	</tr>
</table>
       
             <div class="pull-right">
                <tr>
               
                    <td><?php echo btn_editTwo('admin/survey/edit/' . $surv['id']); ?></td>
               		<td><button class="tiny ui blue button" id="button_view_results" value="vertical flip">Result</button></td>
                </tr>
            </div>  

<!--------------------               VIEW RESULTS STARTS HERE               -------------------------------------------------------------!-->
            
        <div class="ui modal scrolling" id="modal_view_results">
            <i class="close icon"></i>
            <div class="header">
              <?php echo  $surv['name']; ?>
            </div>
            <div class="content">
            
              <div class="description">
                                                “Provocative” and “controversial,” in the context of a widely-discussed article, usually mean that it reflects a prevailing mood, typically at the exact moment before it becomes “conventional wisdom”—it makes some important people (with a vested interest that’s being attacked) angry and defiant, helping to increase its prominence, but it also resonates with the great majority of the audience interested in the article’s topic, articulating and crystallizing for them their feelings and attitudes, be they positive or negative.

                                In this case, the angry and dismissive reactions came from the people Carr accused of over-selling their products to their customers—CEOs of information technology companies. The vast interest in and acceptance of what Carr said came from the multitudes who were still suffering in 2003 from the dot-com bubble hangover. Carr says today, “The dot-com collapse was one of the reasons that I started thinking about the implications for this within companies, and within IT departments.” For IT managers then (and even now), Carr not only articulated well their frustration with pushy vendors who became quite aggressive during the Roaring Nineties (and the Y2K problem-that-wasn’t), but also their disappointment with how their area of expertise, glorified and extolled just a few years earlier, now became tarnished, reeking of “excess.”


                                Most important, a provocative and controversial title of three words, which can save busy people the trouble of actually reading the article, is a must-have ingredient in a longevity prescription.

                                Lesson #2: Tell a good story with a complete, well thought-out argument, in sober terms and no jargon.

                                Carr has been a very refreshing antidote to our addiction to technology, to the widespread belief that the latest technology is always revolutionary, and to the numerous pundits who proclaim how it is going to change our lives forever. I remember watching Carr give 

                                              a keynote address explaining methodically why IT doesn’t matter at an IT conference in 2004, followed the next day by a famous business consultant/author rebutting Carr and insisting on the importance of IT. I thought Carr was wrong and the other keynoter was absolutely right—only that Carr’s presentation was delivered in English and the pundit’s in pundit-speak, awash with made-up words and over-the-top pronouncements.

                                Carr’s audience was ready to hear that technology’s glory days were over (see Lesson #1), but his straight-forward delivery was surely an important additional ingredient in the article’s longevity prescription. That should be encouraging to writers trying hard, in the face of so many examples to the contrary, to avoid thinking outside the box or shifting a paradigm or disrupting something or inventing new terms and made-up words (see The Most Annoying, Pretentious And Useless Business Jargon).

                                Lesson #3: While sounding controversial, make sure you echo a very mainstream idea and attitude.


                                In 2003, Carr declared the end of IT innovation: “The opportunities for gaining IT-based advantages are already dwindling. Best practices are now quickly built into software or otherwise replicated. And as for IT-spurred industry transformations, most of the ones that are going to happen have likely already happened or are in the process of happening.”

                                It so happened that a few days ago, Ben Bernanke, Chairman of the Federal Reserve Board, talked in his Bard College commencement address about “knowledgeable observers [that] have recently made the case that the IT revolution, as important as it surely is, likely will not generate the transformative economic effects that flowed from the earlier technological revolutions.” He was referring not to Carr but to very recent observations by economists Robert Gordon and Tyler Cowen, and also pointed out that similar observations have been made for a long time, quoting John Maynard Keynes’s reaction to this mindset in the midst of the Great Depression: “We are suffering just now from a bad attack of economic pessimism. It is common to hear people say that the epoch of enormous economic progress which characterised the 19th century is over; that the rapid improvement in the standard of life is now going to slow down.”

                                Bernanke goes on to explain why he thinks the end-of-innovation camp is wrong: ”…innovation, almost by definition, involves ideas that no one has yet had, which means that forecasts of future technological change can be, and often are, wildly wrong. A safe prediction, I think, is that human innovation and creativity will continue; it is part of our very nature. Another prediction, just as safe, is that people will nevertheless continue to forecast the end of innovation.”

                                Another ingredient in the longevity prescription is to be in good company.


                                Lesson #4: Make sure you use “convincing” historical analogies even if they have nothing to do with the topic of discussion.

                                Carr argued that IT is like other “infrastructure technologies” that lost their competitive potential once they became “accessible and affordable to all.” But IT is different, it has constantly expanding functionality, while Carr’s other technologies—steam engines, railroads, electricity, telephones—have narrow functionality. Electricity—which was Carr’s key historical analogy in his subsequent book, The Big Switch, hasn’t changed much since we found a way to harness and deliver it. Unlike electricity, IT is very different from what it was even ten years ago.

                                Electricity is a commodity, IT is not. But again, Carr was in great company (see Lesson #3). The so-called “Moore’s Law” is interpreted by Carr and others to mean that the relentless reduction in the cost of computing makes IT a “commodity,” widely available and abundant. Another interpretation of Moore’s Law is that there are endless new possible applications of IT.  Bernanke again: “Some would say that we are still in the early days of the IT revolution; after all, computing speeds and memory have increased many times over in the 30-plus years since the first personal computers came on the market, and fields like biotechnology are also advancing rapidly. Moreover, even as the basic technologies improve, the commercial applications of these technologies have arguably thus far only scratched the surface.”

                                The mistaken view of IT as a commodity made Carr miss the greatest application of IT over the last decade—the use of IT to drive the business (or the competitive advantage, the strategic differentiation, that Carr thought could no longer be associated with IT) by Web-born companies. “The article was really about the IT infrastructure,” Carr explains to Network World, “which is basically what IT departments were mainly concerned with 10, 11 years ago. I think that has become fairly uninteresting from a strategic point of view.” Tell this to Amazon, Google, Facebook, LinkedIn, Netflix, and so many other new companies that IT begat and that thrive, among other reasons, because of their innovative IT infrastructure and innovative use of IT.


                                But even if you limit the discussion to traditional companies and their traditional IT organizations, it is ridiculous to say there hasn’t been innovation in IT infrastructure over the last ten years. Virtualization is just one example. It has not only made the IT infrastructure much more efficient, it has also provided the means for the IT organization to be flexible and responsive like never before, effectively supporting new strategic business initiatives. Without virtualization there will be no Cloud Computing, the one IT innovation that Carr correctly predicted in 2003, although he mistakenly saw it not as innovation but as a wholesale replacement for the IT organization (his 2005 article “The End of Corporate Computing” also made a splash) and the logical conclusion of his IT-has-become-a-commodity argument.

                                To his credit, Carr tells Network World, “I probably understated the new things that IT departments would have to grapple with.” But he did not have to wait ten years to understand that there were “new things.” Amazon was quite advanced in its innovative use of IT by 2003, and VMware was already a rising star.
              </div>
            </div>
            <div class="actions">
              <div class="ui black button">
                Close
              </div>
              
            </div>
        </div>
     
<!--------------------               VIEW RESULTS MODAL ENDS HERE HERE               -------------------------------------------------------------!-->


</div>