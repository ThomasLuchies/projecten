package Chess.Core.StateAnalysers;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Field;
import Chess.Core.State;
import Chess.Core.Usecases.LocateKing.LocateKing;
import Chess.Core.Utilities.ListAvailableMovesByColor;

public class StalemateAnalyser implements StateAnalyser
{
    @Override
    public State analyse(State current, Board board, Color turn) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        if (current == State.check)
            return current;
        var listMoves = new ListAvailableMovesByColor();
        if (listMoves.list(current, board, turn).isEmpty())
            return State.stalemate;
        return current;
    }
}