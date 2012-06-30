<%@ page import="java.util.*" %><%@ page import="com.mks.api.*" %><%@ page import="com.mks.api.response.*" %><%@ page import="com.mks.api.response.Response" %><%@ page import="com.mks.api.Command.*" %><%@ page import="javax.xml.parsers.*" %><%@ page import="javax.xml.transform.*" %><%@ page import="javax.xml.transform.dom.*" %><%@ page import="javax.xml.transform.stream.*" %><%@ page import="org.w3c.dom.*" %><%@ page import="org.jdom.Document" %><%@ page import="org.jdom.Element" %><%@ page import="org.jdom.output.XMLOutputter" %><%@ page import="org.jdom.output.Format" %><%@ page import="java.io.FileWriter" %><%@ page import="java.io.IOException" %><%@ page import="java.lang.*" %><%

            String issuelist = request.getParameter("issue");
            String[] issuenums = issuelist.split(",");

            Document document = new Document();
            Element root = new Element("issues");
            int count=0;
            for (String issue : issuenums)
            {
                count++;
                String issuenum = issue;

                String id = "";
                String summary = "";
                String state = "";
                


                XMLOutputter outputter = new XMLOutputter();



                //out.println("Test" );
                try
                {

                    // create an instance of the IntegrationPointFactory
                    IntegrationPointFactory ipf = IntegrationPointFactory.getInstance();

                    // connect to remove server
                    IntegrationPoint intPt = ipf.createIntegrationPoint("mksintegrity", 7001);

                    // start a session on the integration point
                    CmdRunner cmdRunner = intPt.createSession("swmksdll", "chA86SeW").createCmdRunner();


                    // Set command defaults
                    cmdRunner.setDefaultHostname("mksintegrity");
                    cmdRunner.setDefaultPort(7001);
                    cmdRunner.setDefaultUsername("swmksdll");
                    cmdRunner.setDefaultPassword("chA86SeW");


                    // constructor for the command
                    Command myCommand = new Command(Command.IM, "issues");
                    myCommand.addOption(new Option("fields", "ID,Summary,State"));
                    String issueid = issuenum;
                    myCommand.addSelection(issueid);
                    String[] myArray = myCommand.toStringArray();
                    out.println("This is debug");
                    //out.println(myArray[1]);

                    try
                    {
                        Response myResponse = cmdRunner.execute(myCommand);
                        for (WorkItemIterator i = myResponse.getWorkItems(); i.hasNext();)
                        {
                            WorkItem wi = i.next();

                            // out.println("<issue>");
                            // out.println("<ID>");
                            //  out.println(wi);
                            //out.println("</ID>");
                            //out.println("Model Type : " + wi.getModelType()+ "\n");
                            //out.println("Context : " + wi.getContext() + "\n");
                            //out.println("ContextKeys : " + wi.getContextKeys());
                            //out.println("<summary>");
                            //out.println(wi.getField("Summary").getValueAsString());
                            //out.println("</summary>");
                            // out.println("</issue>");

                            id = wi.getField("ID").getValueAsString();
                            summary = wi.getField("Summary").getValueAsString() + count;
                            state = wi.getField("State").getValueAsString();


                            Element child2 = new Element("issue");
                            child2.addContent(new Element("ID").setText(id));
                            child2.addContent(new Element("Summary").setText(summary));
                            child2.addContent(new Element("State").setText(state));

                            //
                            // Add the child to the root element and add the root element as
                            // the document content.
                            //
                            root.addContent(child2);
                            //document.setContent(root);

                        }

                    }
                    catch (Exception e)
                    {

                        out.println(e);
                    }
                    finally
                    {
                        // out.println("Cleanup");
                    }


                }
                catch (Exception e)
                {
                    out.println(e);
                }
                finally
                {
                    //out.println("Cleanup");
                }
                document.setContent(root);
                //
                // Set the XLMOutputter to pretty formatter. This formatter
                // use the TextMode.TRIM, which mean it will remove the
                // trailing white-spaces of both side (left and right)
                //
                outputter.setFormat(Format.getPrettyFormat());

                //
                // Write the document to a file and also display it on the
                // screen through System.out.
                //
                //outputter.output(document, writer);
                //outputter.output(document, System.out);
                //out.println(document.toString());
                outputter.output(document, out);

            }
%>

