FROM continuumio/anaconda3

RUN /opt/conda/bin/conda install jupyter -y --quiet && mkdir /opt/notebooks

EXPOSE 8888
EXPOSE 8889

ENV jtoken freedom

RUN apt-get update && apt-get install jq git openssh-server tmux curl bash gnupg gnupg2 -yq && curl -sL https://deb.nodesource.com/setup_8.x | bash && apt-get install nodejs -yq

# nteract Jupyter
RUN pip install nteract_on_jupyter


CMD /opt/conda/bin/jupyter notebook --notebook-dir=/opt/notebooks --ip='*' --port=8888 --no-browser --allow-root --NotebookApp.token=${jtoken}


